<?php

namespace App\Repositories\web\Skills;

use App\Entities\Teams\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Skill;
use App\Repositories\web\Employees\EmployeeRepository;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Skills\SkillsTypeRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SkillsRepository extends Form implements RepositoryInterface
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
        return Skill::findOrfail($id);
    }

    /**
     * Get's all teams.
     *
     * @return mixed
     */
    // public function all()
    // {
    //     return Skill::all()->sortByDesc('created_at');
    // }

    public function all()
    {
      return Skill::all()->sortBy('created_at');
    }

    public function store(array $data)
    {
        if (self::is_valid()) {

            // create a team
            $skill = Skill::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'number_of_years' => $data['number_of_years'],
                'personal_rating' => $data['personal_rating'],
                'skill_type_id' => $data['skill_type_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'project_id' => $data['project_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('skills.show', [$skill->id])
                ->with('success', 'You have successfully create Skills' . $data['name']);
        }
        return redirect()
            ->back()
            ->withErrors(self::errors())
            ->withInput(self::submission());
    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {
        Skill::destroy($id);
    }

    //update team details

    public function update($id, array $data)
    {
        self::get($id)->update($data);
    }
    public function getActiveSkills()
    {
        $active_skills = App::make(SkillsRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor skills

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