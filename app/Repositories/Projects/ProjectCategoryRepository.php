<?php

namespace App\Repositories\Projects;

use App\Entities\Projects\Categories\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Projects\Project;
use App\Model\Projects\ProjectCategory;
use App\Model\Projects\ProjectsCategory;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

class ProjectCategoryRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return ProjectsCategory::all()->where('active', 1);
    }
    public function get($id)
    {
        return ProjectsCategory::findOrfail($id);
    }
    /**
     *
     *  get all web Projects
     *
     */
    public function get_Project_categories()
    {
        return ProjectsCategory::all()->sortBy('created_at');

    }

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return ProjectsCategory::all()->sortBy('created_at');
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

                return ProjectsCategory::whereIn('store_id',
                    $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }
    public function show($id)
    {
        return ProjectsCategory::where('id', $id)->first();

    }
    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {
            $project_category_avatar = request()->file('avatar');

            if ($project_category_avatar) {

                $file_name = time() . '.' . $project_category_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/projects/category/' . $file_name);
                Image::make($project_category_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }
            // create a project
            $category = ProjectsCategory::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'avatar' => $file_name,
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('project_category.show', [$category->id])
                ->with('success', 'You have successfully create a Project category' . $data['title']);
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
            $location = public_path('assets/images/projects/category/' . $f_name);
            Image::make($avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        self::get($id)->update($data);
        return redirect('project-category/' . $id)->with('success', 'Project updated successfully');

    }

    public function getActiveProjectCategories()
    {
        $active_category = App::make(ProjectCategoryRepository::class)->all()
            ->where('active', '1')->count();
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

    public function projectByCategory($id)
    {
        return ProjectCategory::where('category_id', $id)->get();
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

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function projectCategoryBelongsToLicensor($category)
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
    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        ProjectsCategory::destroy($id);
    }
}