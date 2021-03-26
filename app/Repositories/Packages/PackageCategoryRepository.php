<?php

namespace App\Repositories\Packages;

use App\Entities\Packages\Categories\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Packages\Package;
use App\Model\Packages\PackagesCategory;
use App\Model\Permissions\Role;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class PackageCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return PackagesCategory::all()->where('active', 1);
    }
    public function get($id)
    {
        return PackagesCategory::findOrfail($id);
    }
    /**
     *
     *  get all web packages
     *
     */
    public function get_package_categories()
    {
        return PackagesCategory::all()->sortBy('created_at');

    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return PackagesCategory::all()->sortBy('created_at');
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

                return PackagesCategory::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }

    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {

            $avatar = request()->file('avatar');

            if ($avatar) {

                $file_name = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('assets/images/packages/category/' . $file_name);
                Image::make($avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }

            $category = PackagesCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('package_category.show', [$category->id])
                ->with('success', 'You have successfully create a Package category' . $data['title']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());

    }
    //update project details

    public function update($id, array $data)
    {
        if (self::is_valid()) {
            if (isset($data['active'])) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }

            if (array_key_exists('avatar', $data)) {
                $package_category_avatar = request()->file('avatar');

                $f_name = time() . '.' . $package_category_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/packages/category/' . $f_name);
                Image::make($package_category_avatar)->resize(400, 400)->save($location);
                $data['avatar'] = $f_name;
            }

            'avatar' == $f_name;

            self::get($id)->update($data);
            return redirect('package-category/' . $id)->with('success', 'package Category updated successfully');
        }

    }

    public function getActivePackageCategories()
    {
        $active_category = App::make(PackageCategoryRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor projects

        return (object) ['active' => $this->getActiveTotal(self::all())];
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
    public function getRoles()
    {
        return Role::all();
    }
    public function packageByCategory($id)
    {

        return PackageCategory::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function is_valid()
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }
    public function getErrors()
    {
        return self::validation()->errors();
    }
    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function packageCategoryBelongsToLicensor($category)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$category->store()) {
            // return 'no';
        }
        $store_id = $category->store()->first()->id;
        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id])->first()) ? true : false;
    }
    public function unpublish($id)
    {
        self::update($id, array('active' => 0));
    }
    public function getFormValues()
    {
        return request()->all();
    }
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        PackagesCategory::destroy($id);
    }
}