<?php

namespace App\Repositories\web\Bookings;

use App\Entities\Bookings\Venues\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Bookings\BookingCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BookingCategoryRepository extends Form implements RepositoryInterface
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
        return BookingCategory::findOrfail($id);
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
                return BookingCategory::all()->sortBy('created_at');
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

            // create a Venue
            $category = BookingCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('booking_category.show', [$venue->id])
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
        BookingCategory::destroy($id);
    }

    //update venue details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getActiveCategories()
    {
        $active_categories = App::make(BookingCategoryRepository::class)->all()
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
    public function getBookingCategories()
    {
        return App::Make(BookingCategoryRepository::class)->all()->pluck('title', 'id');
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