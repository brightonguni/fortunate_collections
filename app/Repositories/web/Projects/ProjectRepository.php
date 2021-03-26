<?php

namespace App\Repositories\web\Projects;

use App\Entities\Projects\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Projects\Project;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Skills\SkillsRepository;
use App\Repositories\web\Skills\SkillsTypeRepository;
use App\Repositories\web\Stores\StoreRepository;
use App\Repositories\web\Teams\TeamRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProjectRepository extends Form implements RepositoryInterface
{
    use Statistics;

    /**
     * @return string
     *  Return the model
     */
    public function index()
    {
        return Project::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    }

    public function get($id)
    {
        return Project::findOrfail($id);
    }
    /**
     *
     *  get all projects
     *
     */

    public function all()
    {
      return Project::all()->sortBy('created_at');

        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        // $role = Auth::user()->role->id;

        // switch ($role) {
        //     case "1":
        //         return Project::all()->sortBy('created_at');
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
            $project = Project::create([
                'name' => $data['name'],
                'Description' => $data['Description'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'team_id' => $data['team_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('projects.show', [$project->id])
                ->with('success', 'You have successfully create a Project' . $data['description']);
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
        $active_projects = App::make(ProjectRepository::class)->all()
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
    public function getSkills()
    {
        return App::make(SkillsRepository::class)->all()->pluck('name', 'id');
    }
    public function getSkillTypes()
    {
        return App::make(SkillsTypeRepository::class)->all()->pluck('name', 'id');

    }
    public function projectByCategory($id)
    {
        return Project::where('category_id', $id)->get();
    }
    public function getRoles()
    {
        return Role::all();
    }

    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }

    public function getTeams()
    {
        return App::make(TeamRepository::class)->all()->pluck('name', 'id');
    }
    public function validateRequest()
    {
        $validator = tap(Validator::make(self::getFormValues(), [
            'name' => 'required|min:3|string',
            'description' => 'required|max:60|string',
            'store_id' => 'required|numeric',
            'team_id' => 'required|numeric',
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
        Project::destroy($id);
    }
}