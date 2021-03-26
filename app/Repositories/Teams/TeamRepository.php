<?php

namespace App\Repositories\Teams;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Employee;
use App\Model\Employees\Skill;
use App\Model\Employees\Team;
use App\Model\Permissions\Role;
use App\Model\Projects\Project;
use App\Repositories\Employees\EmployeeRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Skills\SkillsRepository;
use App\Repositories\Skills\SkillsTypeRepository;
use App\Repositories\Stores\StoreRepository;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TeamRepository extends Form implements RepositoryInterface
{
    use Statistics;

/**
 * Description of TeamRepository
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
        return Team::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Team::all()->sortByDesc('created_at');
    // }
    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Team::all()->sortBy('created_at');
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

                return Team::whereIn('store_id', $licensor_stores)
                    ->get()
                    ->sortBy('created_at');
                break;
        }

        return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a team
            $team = Team::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);

            if (array_key_exists('employees',$data )) {
                self::setTeamEmployees($team->id);

            }
            if (array_key_exists('projects', $data)) {
                self::setTeamProjects($team->id);

            }
            if (array_key_exists('skills', $data)) {
                self::setTeamSkills($team->id);

            }
            return redirect()->route('teams.show', [$team->id])
                ->with('success', 'You have successfully create Team' . $data['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
    }
// setters
    public function setTeamEmployees($id)
    {
        self::get($id)->employees()->sync(self::submission('employees'));
    }
    public function setTeamProjects($id)
    {
        self::get($id)->projects()->sync(self::submission('projects'));

    }
    public function setTeamSkills($id)
    {
        self::get($id)->skills()->sync(self::submission('skills'));

    }

    // getters
    public function getTeamEmployees()
    {
        return Employee::all();
    }
    public function getTeamProjects()
    {
        return Project::all();
    }
    public function getTeamSkills()
    {
        return Skill::all();
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        Team::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveTeams()
    {
        $active_teams = App::make(TeamRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor teams

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
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }
    public function getSkillTypes()
    {
        return App::Make(SkillsTypeRepository::class)->all()->pluck('name', 'id');
    }
    public function getSkills()
    {
        return App::Make(SkillsRepository::class)->all()->pluck('name', 'id');
    }
    public function getTeamMembers()
    {
        return App::Make(EmployeeRepository::class)->all()->pluck('name', 'id');
    }

    public function getStores()
    {
        return App::Make(StoreRepository::class)->all()->pluck('name', 'id');
    }
    public function getFormValues()
    {
        return request()->all();
    }
    public function getRoles()
    {
        return Role::all();
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
    public function is_valid($edit = false)
    {
        if (self::validation()->fails()) {
            return false;
        }
        return true;
    }

}