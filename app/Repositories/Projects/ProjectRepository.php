<?php

namespace App\Repositories\Projects;

use App\Entities\Projects\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Skill;
use App\Model\Employees\SkillsLevel;
use App\Model\Employees\Team;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\Role;
use App\Model\Projects\Project;
use App\Model\Projects\ProjectsCategory;
use App\Model\Projects\ProjectSubCategory;
use App\Model\Services\Service;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Skills\SkillsRepository;
use App\Repositories\Skills\SkillsTypeRepository;
use App\Repositories\Stores\StoreRepository;
use App\Repositories\Teams\TeamRepository;
use App\Stores\Stores;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Image;

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
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Project::all()->sortBy('created_at');
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
    public function show($id)
    {
        return Project::where('id', $id)->first();

    }
    //  save data
    public function store(array $data)
    {
        if (self::is_valid()) {

            $project_avatar = request()->file('avatar');

            if ($project_avatar) {
                $file_name = time() . '.' . $project_avatar->getClientOriginalExtension();
                $location = public_path('assets/images/projects/' . $file_name);
                Image::make($project_avatar)->resize(300, 300)->save($location);
                $data['avatar'] = $file_name;
            }
            // create a project
            $project = Project::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'licensor_id' => $data['licensor_id'],
                'avatar' => $file_name,
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);

            if (array_key_exists('sub_categories', $data)) {
                self::setProjectSubCategories($project->id);
            }

            if (array_key_exists('categories', $data)) {
                self::setProjectCategories($project->id);
            }
            if (array_key_exists('services', $data)) {
                self::setProjectServices($project->id);
            }

            return redirect()
                ->route('project.show', [$project->id])
                ->with('success', 'You have successfully create a Project' . $data['name']);
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
            $location = public_path('assets/images/projects/' . $f_name);
            Image::make($avatar)->resize(400, 400)->save($location);
            $data['avatar'] = $f_name;
        }
        'avatar' == $f_name;

        self::get($id)->update($data);
        return redirect('project/' . $id)->with('success', 'Project updated successfully');

    }
    public function setProjectServices($id)
    {
        self::get($id)->services()->sync(self::submission('services'));
    }
    public function setProjectSkills($id)
    {
        self::get($id)->skills()->sync(self::submission('skills'));
    }
    public function setProjectTeams($id)
    {
        self::get($id)->teams()->sync(self::submission('teams'));
    }
    public function setProjectCategories($id)
    {
        self::get($id)->categories()->sync(self::submission('categories'));
    }
    public function setProjectSubCategories($id)
    {
        self::get($id)->sub_categories()->sync(self::submission('sub_categories'));
    }
    public function getActiveProjects()
    {
        $active_projects = App::make(ProjectRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor projects

        return (object) ['active' => $this->getActiveTotal(self::all())];
    }
    public function getAllTeams()
    {
        return Team::all();
    }
    public function getAllServices()
    {
        return Service::all();
    }
    public function getAllSubCategories()
    {
        return ProjectSubCategory::all();
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
    public function getAllCategories()
    {
        return ProjectsCategory::all();
    }
    public function getSkills()
    {
        return App::make(SkillsRepository::class)->all()->pluck('title', 'id');
    }
    public function getAllSkills()
    {
        return Skill::all();
    }
    public function getSkillLevels()
    {
        return SkillsLevel::all();
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

    public function is_valid($edit = false)
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