<?php

namespace App\Repositories\Bookings;

use App\Entities\Bookings\Venues\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Bookings\Venue;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class VenuesRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of VenuesRepository
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
        return Venue::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    public function all()
    {
      return Venue::all()->sortBy('created_at');

        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        // $role = Auth::user()->role->id;

        // switch ($role) {
        //     case "1":
        //         return Venue::all()->sortBy('created_at');
        //         break;
        //     case "2":
        //         return [];
        //         break;
        //     case "3":
        //         return [];
        //         break;
        //     case "4":
        //         $licens_id = User::findOrfail(Auth::user()->id)
        //             ->LicensorUser()
        //             ->licensor_id;
        //         $licensor_stores = Licensor::findOrfail($licens_id)
        //             ->stores()
        //             ->pluck('store_id');

        //         return Projects::whereIn('store_id',
        //             $licensor_stores)
        //             ->get()
        //             ->sortBy('created_at');
        //         break;
        // }

        // return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a Venue
            $venue = Venue::create([
                'title' => $data['title'],
                'street' => $data['street'],
                'suburb' => $data['suburb'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postal_code' => $data['postal_code'],
                'country' => $data['country'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('venue.show', [$venue->id])
                ->with('success', 'You have successfully create venue' . $data['title']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        Venue::destroy($id);
    }

    //update venue details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getActiveVenues()
    {
        $active_venue = App::make(VenuesRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor venues

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
    public function getVenues()
    {
        return App::Make(VenuesRepository::class)->all()->pluck('title', 'id');
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