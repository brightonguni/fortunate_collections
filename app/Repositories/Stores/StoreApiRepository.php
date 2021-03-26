<?php

namespace App\Repositories\Stores;

use App\Model\Projects\Project;
use App\Entities\Stores\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\LicensorStore;
use App\Model\Permissions\Role;
use App\Model\Stores\Hour;
use App\Model\Stores\Stores;
use App\Repositories\Licensor\LicensorRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Support\Resources\hasCategories;

class StoreApiRepository extends Form implements RepositoryInterface
{
    use Statistics, hasCategories;
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {

    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        $stores = Stores::with(['hours', 'categories'])->get()->sortByDesc('created_at');

        foreach ($stores as $store) {
            $_stores[] = (array) $store->toArray();
        }
        return response()->json(['status' => true, 'data' => $_stores]);
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
                self::unpublish($id);
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
                self::setLogo($id);
            }

            # update the store account
            self::setAccount($id);
            # update the store contact personal
            self::setContact($id);
            # update the store details
            self::get($id)->update($data);
            return redirect('stores/' . $id)->with('success', 'your message here');
        }

//        Session::flash('errors',self::errors());

        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            # create new store
            $new_store = Stores::create($data);
            # create account
            $new_store->account()->create([
                'name' => self::submission('bank_name'),
                'branch_code' => self::submission('branch_code'),
                'type' => self::submission('account_type'),
                'number' => self::submission('number'),
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);

            # create store contact
            $new_store->contacts()->create([
                'name' => self::submission('contactPerson'),
                'phone' => self::submission('contactPhone'),
            ]);

            # update the store categories details
            if (array_key_exists('categories', $data)) {
                self::setCategories($new_store->id);
            }

            # update the store trading hours details
            if (array_key_exists('hour', $data)) {
                self::setTradeHours($new_store->id);
            }

            # update the store trading hours details
            if (array_key_exists('logo', $data)) {
                self::setLogo($new_store->id);
            }

            return redirect('stores/' . $new_store->id)->with('success', 'your message here');
        }

//        Session::flash('errors',self::errors());

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

    public function getAllTradeHours()
    {
        return Hour::all();
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

    public function unpublish($id)
    {
        self::update($id, array('active' => 0));
    }

    public function getActiveStoreCategories()
    {
        $stores = Stores::with(['hours', 'categories', 'menus'])->get()->sortByDesc('created_at');
        $categories = [];
        foreach ($stores as $store) {
            if (isset($store->categories)) {
                foreach ($store->categories as $category) {
                    if ($category->name !== 'Unknown') {
                        $categories[$category->id] = [
                            'id' => $category->id,
                            'name' => $category->name,
                        ];
                    }

                }
            }
        }

        return response()->json(['status' => true, 'data' => array_values($categories)], 200);
    }

    public function setLogo($id)
    {
        $file = request()->file('logo');
        $store = self::get($id);
        $store->logo = $file->getClientOriginalName();
        $file->storeAs('logos', $file->getClientOriginalName(), 'public');
        $store->save();
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

    public function storeBelongsToLicensor($store_id)
    {

        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => Auth::user()->licensorUser()->licensor_id])->first()) ? true : false;
    }

    public function userIsLicensor()
    {
        return (Auth::user()->role->name === 'Licensor') ? true : false;
    }

}
