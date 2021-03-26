<?php

namespace App\Repositories\Stores;

use App\Entities\Stores\Address\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Stores\StoresAddress;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class StoreAddressRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of AddressRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {

    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return StoresAddress::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return StoresAddress::all()->sortBy('created_at');
                break;
            case "2":
                return [];
                break;
            case "3":
                return [];
                break;
            case "4":
                $licens_id = User::findOrfail(Auth::user()->id)
                    ->LicensorUser()
                    ->licensor_id;
                $licensor_stores = Licensor::findOrfail($licens_id)
                    ->stores()
                    ->pluck('store_id');

                return StoresAddress::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            $address = StoresAddress::create([
                'street' => $data['street'],
                'suburb' => $data['suburb'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'state_province' => $data['state_province'],
                'country' => $data['country'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            // \Log::info($Address);

            return redirect()
                ->route('store_address.show', [$address->id])
                ->with('success', 'You have successfully create Address' . $data['street']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        StoresAddress::destroy($id);
    }

    //update Address details

    public function update($id, array $data)
    {

        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        self::get($id)->update($data);
       return redirect('store-address/' . $id)->with('success', 'store updated successfully');

        
    }

    public function getActiveAddress()
    {
        $active_Address = App::make(AddressRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor Addresss

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function getStatistics()
    {
        //die($this->getActiveTotal(self::all()));
        return (object)
            [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'total' => $this->getTotal(self::all()),
        ];
    }
    public function getAddresss()
    {
        return App::Make(StoreAddressRepository::class)->all()->pluck('street', '', 'suburb', 'id');
    }

    public function getFormValues()
    {
        return request()->all();
    }

    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getErrors()
    {
        return self::validation()->errors();
    }

    public function is_valid($edit = false)
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

}