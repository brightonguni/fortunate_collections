<?php

namespace App\Repositories\Bookings;

use App\Entities\Bookings\Events\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Bookings\Event;
use App\Repositories\Bookings\VenuesRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class EventsRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of EventsRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return Event::all()->sortBy('created_at');
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Event::findOrfail($id);
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
                return Event::all()->sortBy('created_at');
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

                return Event::whereIn('store_id',
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
            $event_avatar = request()->file('avatar');

            if ($event_avatar) {

                $f_name = time() . '.' . $event_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/bookings/events/' . $f_name);
                Image::make($event_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $f_name;
            }

            // create a event
            $event = Event::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'store_id' => $data['store_id'],
                'venue_id' => $data['venue_id'],
                'service_id' => $data['service_id'],
                'avatar' => $f_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('booking_event.show', [$event->id])
                ->with('success', 'You have successfully create event' . $data['title']);
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
        Event::destroy($id);
    }

    //update event details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveEvents()
    {
        $active_events = App::make(EventsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor departments

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getServiceEvents($id)
    {
        return Event::where('active', '1' && 'service_id', $id)->get();
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }
    public function getServices()
    {
        return App::Make(ServicesRepository::class)->all()->pluck('title', 'id');
    }
    public function getVenues()
    {
        return App::Make(VenuesRepository::class)->all()->pluck('title', 'id');
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