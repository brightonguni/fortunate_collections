<?php

namespace App\Repositories\web\Bookings;

use App\Entities\Bookings\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Bookings\Booking;
use App\Model\Bookings\Event;
use App\Repositories\web\Bookings\BookingCategoryRepository;
use App\Repositories\web\Bookings\EventsRepository;
use App\Repositories\web\Bookings\VenuesRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Services\ServicesRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BookingRepository extends Form implements RepositoryInterface
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

    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Booking::findOrfail($id);
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
                return Booking::all()->sortBy('created_at');
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

                return Projects::whereIn('store_id',
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

            // create a event
            $booking = Booking::create([
                'description' => $data['description'],
                'event_id' => $data['event_id'],
                'venue_id' => $data['venue_id'],
                'category_id' => $data['category_id'],
                'service_id' => $data['service_id'],
                'user_id' => $data['user_id'],
                'licensor_id' => $data['licensor_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('booking.show', [$booking->id])
                ->with('success', 'You have successfully create booking' . $data['title']);
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
        Booking::destroy($id);
    }

    //update event details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveBookings()
    {
        $active_bookings = App::make(EventsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor departments

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

    public function getCategories()
    {
        return App::Make(BookingCategoryRepository::class)->all()->pluck('title', 'id');
    }
    public function getFormValues()
    {
        return request()->all();
    }
    public function getServices()
    {
        return App::Make(ServicesRepository::class)->all()->pluck('title', 'id');
    }
    public function getEvents()
    {
        return App::Make(EventsRepository::class)->all()->pluck('title', 'id');
    }
    public function getVenues()
    {
        return App::Make(VenuesRepository::class)->all()->pluck('title', 'id');
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