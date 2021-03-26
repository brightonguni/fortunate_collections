<?php

namespace App\Repositories\web\Teams;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Team;
use App\Model\Permissions\Role;
use App\Repositories\web\Employees\EmployeeRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Skills\SkillsRepository;
use App\Repositories\web\Skills\SkillsTypeRepository;
use App\Repositories\web\Stores\StoreRepository;
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
        // return Team::orderBy('created_at', 'desc')->paginate(6);
        return Team::all()->sortByDesc('created_at');

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
    public function all()
    {
        return Team::all()->sortByDesc('created_at');

    }

    public function store(array $data)
    {
        //
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {

    }

    //update team details

    public function update($id, array $data)
    {

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