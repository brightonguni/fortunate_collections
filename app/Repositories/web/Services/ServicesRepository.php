<?php

namespace App\Repositories\web\Services;

use App\Entities\Services\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Services\Service;
use App\Model\Services\ServiceCategory;
use App\Model\Services\ServicesCategory;

use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class ServicesRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of ServicesRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return Service::inRandomOrder()->paginate(12);
    }
    public function show($id)
    {
        // return Service::findOrfail($id);
        return Service::where('id', $id)
            ->with(['products'])
            ->first();

    }
    public function serviceByCategory($id)
    {
        return ServiceCategory::where('category_id', $id)->get();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        // return Service::findOrfail($id);

        return Service::where('id', $id)
            ->with(['products'])
            ->first();

    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Service::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        return Service::all()->sortBy('created_at');

    }

    public function store(array $data)
    {
        //
    }
    public function setLogo($id)
    {
        //
    }

    /**
     * Deletes a service.
     *
     * @param int
     */
    public function delete($id)
    {
        Service::destroy($id);
    }

    //update service details

    public function update($id, array $data)
    {
       //
    }
    public function getActivedepartments()
    {
        $active_services = App::make(SevicesRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor services

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