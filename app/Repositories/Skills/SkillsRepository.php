<?php

namespace App\Repositories\Skills;

use App\Entities\Employees\Skill\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Skill;
use App\Model\Employees\SkillsLevel;
use App\Repositories\Employees\EmployeeRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Skills\SkillsTypeRepository;
use App\Repositories\Stores\StoreRepository;
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

    public function all()
    {
        //$role = User::findOrfail(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        switch ($role) {
            case "1":
                return Skill::all()->sortBy('created_at');
                break;
            case "2":
                return [];
                break;
            case "3":
                return [];
                break;
            case "4":
                $licens_id = User::findOrfail(Auth::user()->id)
                    ->LicensorUser()->licensor_id;
                $licensor_stores = Licensor::findOrfail($licens_id)
                    ->stores()->pluck('store_id');

                return Skill::whereIn('store_id',
                    $licensor_stores)
                    ->get()->sortBy('created_at');
                break;
        }

        return [];
    }

    public function store(array $data)
    {
        if (self::is_valid()) {
            $skill = Skill::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'experience' => $data['experience'],
                'level_id' => $data['level_id'],
                'licensor_id' => $data['licensor_id'],
                'store_id' => $data['store_id'],
                'active' => (!array_key_exists('active', $data)) ? 0 : 1,
            ]);
            return redirect()
                ->route('skill.show', [$skill->id])
                ->with('success', 'You have successfully create Skills' . $data['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
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
    public function getSkillLevels()
    {
        return SkillsLevel::all()->pluck('name', 'id');

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