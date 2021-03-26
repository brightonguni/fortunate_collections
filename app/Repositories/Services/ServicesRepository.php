<?php

namespace App\Repositories\Services;

use App\Entities\Services\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Services\Service;
use App\Model\Services\ServicesCategory;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
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
        return Service::all()->sortBy('created_at');
    }
    public function show($id)
    {
        // return Service::findOrfail($id);
        return Service::where('id', $id)
            ->with(['products'])
            ->first();

    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Service::where('id', $id)->with(['products'])->first();

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
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Service::all()->sortBy('created_at');
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

            $service_avatar = request()->file('avatar');

            if ($service_avatar) {

                $f_name = time() . '.' . $service_avatar->getClientOriginalExtension();
                $location = public_path('/assets/images/services/' . $f_name);
                Image::make($service_avatar)->resize(400, 400)->save($location);
                $data['avatar'] = $f_name;
            }

            // create a Service
            $service = Service::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $f_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            if (array_key_exists('categories', $data)) {
                self::setCategories($service->id);
            }

            return redirect()
                ->route('service.show', [$service->id])
                ->with('success', 'You have successfully create a service' . $data['title']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }
    public function setCategories($id)
    {
        self::get($id)->categories()->sync(self::submission('categories'));
    }
    public function getCategories()
    {
        return ServicesCategory::all();
    }
    public function setServiceAvatar($id)
    {
        $file = request()->file('logo');
        $service = self::get($id);
        $f_name = time() . '.' . $service_avatar->getClientOriginalExtension();
        $service_avatar->move(base_path() . 'assets/images/services/logo/', $f_name);
        $data['avatar'] = $f_name;

    }
    public function getServiceCategories()
    {
        return App::Make(ServiceCategoryRepository::class)->all()->pluck('title', 'id');

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
       if (self::is_valid()) {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $service_avatar = request()->file('avatar');
            $f_name = time() . '.' . $service_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/services/' . $f_name);
            Image::make($service_avatar)->resize(500, 500)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;
        self::get($id)->update($data);
        return redirect('service/' . $id)->with('success', 'Blog updated successfully');
      }
    }
    
    public function getActiveServices()
    {
        $active_services = App::make(ServicesRepository::class)->all()
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