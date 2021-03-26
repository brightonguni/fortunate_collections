<?php

namespace App\Repositories\Packages;

use App\Entities\Packages\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Packages\Package;
use App\Model\Products\Product;
use App\Model\Services\Service;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Services\ServicesRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class PackageRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of packagesRepository
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
        return Package::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return package::all()->sortByDesc('created_at');
    // }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Package::all()->sortBy('created_at');
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

                return Package::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }
    public function show($id)
    {
        return Package::where('id', $id)->first();

    }
    public function store(array $data)
    {
        if (self::is_valid()) {
            $package_avatar = request()->file('avatar');

            if ($package_avatar) {
                $f_name = time() . '.' . $package_avatar->getClientOriginalExtension();
                $location = public_path('/assets/images/packages/' . $f_name);
                Image::make($package_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $f_name;
            }
            $package = Package::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $f_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            if (array_key_exists('products', $data)) {
                self::setProducts($package->id);
            }
            if (array_key_exists('services', $data)) {
                self::setServices($package->id);
            }
             if (array_key_exists('package_categories', $data)) {
                self::setServices($package_categories->id);
            }

            return redirect()->route('package.show', [$package->id])
                ->with('success', 'You have successfully create packages' . $data['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }
    public function setProducts($id)
    {
        self::get($id)->products()->sync(self::submission('products'));

    }
    public function setPackageCategories($id)
    {
      self::get($id)->package_categories()->sync(self::submission('package_categories'));
    }
    public function setServices($id)
    {
        self::get($id)->services()->sync(self::submission('services'));

    }

    public function getAllPackageCategories()
    {
        return PackagesCategory::all();
    }
    public function getAllProducts()
    {
        return Product::all();
    }
    public function getAllServices()
    {
        return Service::all();
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        Package::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $package_avatar = request()->file('avatar');

            $f_name = time() . '.' . $package_avatar->getClientOriginalExtension();
            $location = public_path('assets/images/packages/' . $f_name);
            Image::make($package_avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        self::get($id)->update($data);
        return redirect('package/' . $id)->with('success', 'Package updated successfully');

    }
    public function getActivePackages()
    {
        $active_packages = App::make(PackageRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor packages

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    //getPackageByCategory
    public function getPackageByCategory($id)
    {
      return PackageCategory::where('category_id', $id)->get();
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }
    public function getPackageCategories()
    {
        return App::Make(PackageCategoryRepository::class)->all()->pluck('title', 'id');
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
     

    public function getServices()
    {
        return App::Make(ServicesRepository::class)->all()->pluck('title', 'id');

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