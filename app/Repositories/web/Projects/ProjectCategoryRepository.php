<?php

namespace App\Repositories\web\Projects;

use App\Entities\Projects\Categories\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Projects\Project;
use App\Model\Projects\ProjectsCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

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
      return ProjectsCategory::all()->sortBy('created_at');

        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        // $role = Auth::user()->role->id;

        // switch ($role) {
        //     case "1":
        //         return ProjectsCategory::all()->sortBy('created_at');
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

    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a project
            $category = ProjectsCategory::create([
                'name' => $data['name'],
                'Description' => $data['Description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('projects.show', [$category->id])
                ->with('success', 'You have successfully create a Project category' . $data['name']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());

    }
    //update project details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }

    public function getActiveProjects()
    {
        $active_category = App::make(ProjectCategoryRepository::class)->all()
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
    // public function ProjectByCategory($id)
    // {
    //     return Project::where('category_id', $id)->get();
    // }
    public function productByCategory($id)
    {
        return Project::where('category_id', $id)->get();
    }
    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function validateRequest()
    {
        $validator = tap(Validator::make(self::getFormValues(), [
            'name' => 'required|min:3|string',
            'description' => 'required|max:60|string',
            'store_id' => 'required|numeric',
            'licensor_id' => 'required|numeric',
        ]), function () {
            if (request()->has('status')) {
                Validator::make(request()->all(), [
                    'status' => 'required|numeric',
                ]);
            }
        });
        return $validator;
    }
    public function is_valid()
    {
        if (self::validationRequest()->fails()) {
            return false;
        }
        return true;
    }

    public function userIsLicensor()
    {
        $loggedin_user_role = User::findOrFail(Auth::user()->id)->role();
        return ($loggedin_user_role->name === 'Licensor') ? true : false;
    }
    public function projectBelongsToLicensor($project)
    {
        $loggedin_licensor_id = User::find(Auth::user()->id)->licensorUser()->licensor_id;
        if (!$project->store()) {
            // return 'no';
        }
        $store_id = $project->store()->first()->id;
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