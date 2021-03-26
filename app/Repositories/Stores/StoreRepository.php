<?php

namespace App\Repositories\Stores;

use App\Entities\Stores\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Customers\Customer;
use App\Model\Licensors\LicensorStore;
use App\Model\Permissions\Role;
use App\Model\Stores\Hour;
use App\Model\Stores\Stores;
use App\Model\Stores\StoresAddress;
use App\Model\Stores\StoresCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Support\Resources\hasCategories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class StoreRepository extends Form implements RepositoryInterface
{
    use Statistics, hasCategories;
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function index()
    {
        return Stores::all();
    }
    public function get($id)
    {
        return Stores::where('id', $id)
            ->with(['contacts', 'hours', 'account', 'categories', 'projects', 'products'])
            ->first();
    }
    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        $stores = [];

        if (!Auth::user()) {
            return [];
        }
        $role = Auth::user()->role->id;
        switch ($role) {
            case 1:
                $stores = Stores::with(['hours', 'categories', 'projects'])->get()->sortBy('id');
                foreach ($stores as $store) {
                    $store->own = '1';

                    $store->isActive = ($store->active) ? true : false;
                }
                break;
            case 3:

                break;
            case 4:

                $stores = Stores::with(['hours', 'categories', 'projects', 'storeLicensor'])->where(['active' => 1])->get()
                    ->sortBy('id');

                foreach ($stores as $store) {
                    $own = $this->storeLicensorOwn($store->id);
                    $notOwn = $this->storeLicensorNotOwn($store->id);

                    $store->own = 0;
                    $store->isActive = false;

                    if ($own) {
                        $store->own = 1;
                        $store->isActive = ($own->isActive) ? true : false;
                    }
                    if ($notOwn) {
                        $store->isActive = ($notOwn->isActive) ? true : false;
                    }

                }

//                $stores2 = Licensor::find(Auth::user()->licensorUser()->licensor_id)->stores()
                //                    ->with(['hours','categories','projects'])
                //                    ->get()->sortBy('id');

                break;
        }
        return $stores;

    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        Stores::destroy($id);
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     * @return mixed
     */
    public function update($id, array $data)
    {
        if (self::is_valid()) {

            # update the store publish status
            if (!array_key_exists('active', $data)) {

                if (Auth::user()->role->id == 1) {
                    self::unpublish($id);
                }
                if (Auth::user()->role->id == 4) {
                    self::deactivate($id, 0);

                    unset($data['active']);
                }
            } else {
                if (Auth::user()->role->id == 4) {
                    self::deactivate($id, 1);

                    unset($data['active']);
                }
            }

            # update the store categories details
            if (array_key_exists('categories', $data)) {
                self::setCategories($id);
            }

            # update the store trading hours details
            if (array_key_exists('hour', $data)) {
                self::setTradeHours($id);
            }

            # update the store logo
            if (array_key_exists('logo', $data)) {
                $store_logo = request()->file('logo');

            }

            $store_logo = request()->file('logo');
            if ($store_logo) {
                $f_name = time() . '.' . $store_logo->getClientOriginalExtension();
                $store_logo->move(base_path() . '/public/images/store/logo/', $f_name);
                $data['logo'] = $f_name;
            }

            // \Log::info("store update");
            // \Log::info($data);

            # update the store account
            self::setAccount($id);
            # update the store contact personal
            self::setContact($id);
            # update the store details
            self::get($id)->update($data);
            return redirect('stores/' . $id)->with('success', 'store updated successfully');
        }

//        Session::flash('errors',self::errors());

        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            $store_avatar = request()->file('avatar');
            if ($store_avatar) {

                $f_name = time() . '.' . $store_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/store/' . $f_name);
                Image::make($store_avatar)->resize(400, 400)->save($location);
                $data['avatar'] = $f_name;
            }
            $store_logo = request()->file('logo');
            if ($store_logo) {

                $logo_name = time() . '.' . $store_logo->getClientOriginalExtension();
                $location = public_path('assets/images/store/logo/' . $logo_name);
                Image::make($store_avatar)->resize(400, 400)->save($location);
                $data['logo'] = $logo_name;
            }

            // $isActive = 0;

            // if ($this->userIsLicensor()) {
            //     $isActive = (isset($data['active'])) ? $data['active'] : 0;
            //     $data['active'] = 1;
            // }
            // \Log::info("store");
            // \Log::info($data);

            $store = Stores::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'website' => $data['website'],
                'description' => $data['description'],
                'avatar' => $f_name,
                'logo' => $logo_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);

            # update the store categories details
            if (array_key_exists('categories', $data)) {
                self::setCategories($store->id);
            }

            # update the store trading hours details
            if (array_key_exists('hours', $data)) {
                self::setTradeHours($store->id);
            }
            // if (array_key_exists('addresses', $data)) {
            //     self::setAddresses($store->id);
            // }

            // if ($this->userIsLicensor()) {
            //     self::setStoreLicensor($store->id, $isActive);
            // }

            return redirect()
                ->route('store.show', [$store->id])
                ->with('success', 'You have successfully create contacts' . $data['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    public function getStatistics()
    {
        return (object) [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'deleted' => $this->getDeletedTotal(self::all()),
        ];
    }
    public function getRoles()
    {
        return Role::all();
    }
    public function is_valid()
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

//        return only validated data
    public function getFormValues()
    {
        $validator = App::make(SubmitForm::class);
        return $validator->getSubmissions();
    }
    public function getAllAddresses()
    {
        return StoresAddress::all();
    }
    public function getAllTradeHours()
    {
        return Hour::all();
    }

    public function getAllCategories()
    {
        return StoresCategory::all();
    }

    public function projects($store_id)
    {
        return project::where(['store_id' => $store_id])->get();
    }

    public function setTradeHours($id)
    {
        self::get($id)->hours()->sync(self::submission('hour'));
    }

    public function setCategories($id)
    {
        self::get($id)->categories()->sync(self::submission('categories'));
    }

    public function setAccount($id)
    {
        self::get($id)->account()->update([
            'name' => self::submission('bank_name'),
            'branch_code' => self::submission('branch_code'),
            'type' => self::submission('account_type'),
            'number' => self::submission('number'),
        ]);
    }

    public function setContact($id)
    {
        self::get($id)->contacts()->update([
            'name' => self::submission('contactPerson'),
            'phone' => self::submission('contactPhone'),
        ]);
    }

    public function setStoreLicensor($store_id, $active)
    {
        $loggedin_licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;

        LicensorStore::create([
            'licensor_id' => $loggedin_licensor_id,
            'store_id' => $store_id,
            'user_id' => Auth::user()->id,
            'own_store' => 1,
            'isActive' => $active,
        ]);
    }

    public function unpublish($id)
    {
        self::update($id, array('active' => 0));
    }

    public function setLogo($id)
    {
        $file = request()->file('logo');

        $store = self::get($id);
        $store->logo = $file->getClientOriginalName();
        $file->storeAs('logos', $file->getClientOriginalName(), '/app/public/store/logo/');
        $store->save();
    }

    public function deactivate($id, $status)
    {
        $store = $this->storeLicensorOwn($id);
        $store->update(['isActive' => $status]);
    }

//    public function upload(){
    //        return
    //    }

    public function getLicensorStores()
    {
        $stores = App::make(LicensorRepository::class)->getStores(2)->stores;
        $collections = [];
        foreach ($stores as $store) {
            $collections[] = self::get($store->id);
        }
        return $collections;
    }

    public function storeLicensorNotOwn($store_id)
    {
        $loggedin_licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;

        return LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id, 'own_store' => 0]
        )->first();
    }

    public function storeLicensorOwn($store_id)
    {
        $loggedin_licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;

        return LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id, 'own_store' => 1]
        )->first();
    }

    public function storeLicense($store_id)
    {
        return LicensorStore::where(['store_id' => $store_id,
            'licensor_id' => Customer::find(Auth::user()->id)->licensorUser()->licensor_id])->first();
    }

    public function storeBelongsToLicensor($store_id)
    {

        $loggedin_licensor_id = Customer::find(Auth::user()->id)->licensorUser()->licensor_id;
        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id, 'own_store' => 1]
        )->first()) ? true : false;
    }

    public function userIsLicensor()
    {
        $loggedin_user_role = Customer::find(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }

}