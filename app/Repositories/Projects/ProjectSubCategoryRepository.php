<?php

namespace App\Repositories\Projects;

use App\Entities\Projects\Categories\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Projects\ProjectSubCategory;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Projects\ProjectCategoryRepository;
use App\Repositories\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class ProjectSubCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return ProjectSubCategory::all()->where('active', 1);
    }
    public function get($id)
    {
        return ProjectSubCategory::findOrfail($id);
    }
    /**
     *
     *  get all web products
     *
     */
    public function get_product_categories()
    {
        return ProjectSubCategory::all()->sortBy('created_at');

    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return ProjectSubCategory::all()->sortBy('created_at');
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

    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {

            $project_sub_category_avatar = request()->file('avatar');

            if ($project_sub_category_avatar) {
                $file_name = time() . '.' . $project_sub_category_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/projects/sub-category/' . $file_name);
                Image::make($project_sub_category_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }

            $sub_category = ProjectSubCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'category_id' => $data['category_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('project_sub_category.show', [$sub_category->id])
                ->with('success', 'You have successfully create a Project sub category' . $data['title']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());

    }
    //update project details

    public function update($id, array $data)
    {
        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $avatar = request()->file('avatar');

            $f_name = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('assets/images/projects/sub-category' . $f_name);
            Image::make($avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        self::get($id)->update($data);
        return redirect('project/' . $id)->with('success', 'ProJect sub-categories updated successfully');

    }
    // public function getCategories()
    // {
    //     return ProjectsCategory::all()->chunk('title', 'id');
    // }
    public function getActiveProducts()
    {
        $active_category = App::make(ProductCategoryRepository::class)->all()
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
    public function productByCategory($id)
    {
        return Product::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getCategories()
    {
        return App::Make(ProjectCategoryRepository::class)->all()->pluck('title', 'id');
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

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function ProjectSubCategoryBelongsToLicensor($product_sub_category)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$product_sub_category->store()) {
        }
        $store_id = $product_sub_category->store()->first()->id;
        return (LicensorStore::where(['store_id' => $store_id, 'licensor_id' => $loggedin_licensor_id])->first()) ? true : false;
    }
    public function unpublish($id)
    {

        if (isset($data['active'])) {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }

        if (array_key_exists('avatar', $data)) {
            $avatar = request()->file('avatar');

            $f_name = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('assets/images/projects/sub-category/' . $f_name);
            Image::make($avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        self::get($id)->update($data);
        return redirect('project-sub-category/' . $id)->with('success', 'Project sub category updated successfully');

    }
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        ProductsCategories::destroy($id);
    }
}