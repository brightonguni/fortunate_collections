<?php

namespace App\Repositories\web\Teams;

use App\Entities\Customers\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\Employee;
use App\Model\Employees\EmployeeSkills;
use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * Description of EmployeesRepository
 *
 * @author brightonguni
 */
class EmployeeRepository extends Form implements RepositoryInterface
{
    use Statistics;
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Employee::findOrfail($id);
    }
    public function getStores()
    {
        $stores = Stores::has('licensor')->get();
        // echo "<pre>";
        $data = [];
        foreach ($stores as $store) {
            // print_r($store->licensor->licensor);
            $data[] = (object) [
                'id' => $store->id,
                'name' => $store->name,
                'licensor' => $store->licensor->licensor,
            ];
        }
        return $data;
        // echo "</pre>";
        // die();
    }
    public function getLicensors()
    {
        return App::Make(LicensorRepository::class)->all()->pluck('name', 'id');
    }
    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Employee::all()->sortByDesc('created_at');

    }
    public function getTeams()
    {
        $teams = Employee::find(category());
        return $employee->category()->title == 'Team';

    }
    public function teamByCategory($id)
    {
        return Employee::where('category_id', $id)->get();
    }
    public function getEmployeeSkills($id)
    {
        return EmployeeSkills::where('employee_id', $id)->get();
    }
    public function trash()
    {

    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {

    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {

    }
    private function validateEmployee($data)
    {

    }

    private function is_bussines($data)
    {

    }

    public function store(array $user)
    {

    }

    public function getStatistics()
    {
        return (object) [
            'active' => $this->getActiveTotal(self::all()),
            'unverified' => $this->getUnverifiedTotal(self::all()),
            'blocked' => $this->getBlockedTotal(self::all()),
            'deleted' => $this->getTrashTotal(self::trash()),
        ];
    }
    public function getDepartments()
    {
        return App::Make(DepartmentsRepository::class)->all()->pluck('name', 'id');

    }
    public function getSkills()
    {
        return App::Make(SkillsRepository::class)->all()->pluck('name', 'id');

    }
    public function getContracts()
    {
        return App::Make(ContractsRepository::class)->all()->pluck('name', 'id');

    }
    public function getProjects()
    {
        return App::Make(ProjectRepository::class)->all()->pluck('name', 'id');
    }
    public function getContractTypes()
    {
        return App::Make(contractTypesRepository::class)->all()->pluck('name', 'id');
    }
// getJobTitles
    public function getJobTitles()
    {
        return App::Make(JobTitlesRepository::class)->all()->pluck('name', 'id');
    }

}