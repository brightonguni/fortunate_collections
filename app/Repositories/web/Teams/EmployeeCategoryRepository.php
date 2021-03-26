<?php

namespace App\Repositories\web\Teams;

use App\Entities\Employees\Category\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Employees\EmployeesCategory;
use App\Repositories\web\Licensors\LicensorRepository;
use App\Repositories\web\Stores\StoreRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class EmployeeCategoryRepository extends Form implements RepositoryInterface
{
    // use Statistics;

/**
 * Description of BlogCategoryRepository
 *
 *
 * @author brightonguni
 */

    public function index()
    {
        return EmployeesCategory::all();
    }
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return EmployeesCategory::findOrfail($id);
    }

    /**
     * Get's all Comments.
     *
     * @return mixed
     */
    public function allCategories()
    {
        return EmployeesCategory::all()->sortByDesc('created_at');
    }

    public function all()
    {
        return EmployeesCategory::all()->sortBy('created_at');

    }

    public function store(array $data)
    {

    }

    /**
     * Deletes a team.
     *
     * @param int
     */
    public function delete($id)
    {

    }

    //update comment details

    public function update($id, array $data)
    {

    }

    public function getEmployeeByCategoryId($id)
    {
        $employeeByCategoryId = App::make(EmployeeRepository::class)->all()
            ->where('category_id', $id)->get();
    }
    public function getActiveCategorries()
    {
        $active_categories = App::make(BlogCategoryRepository::class)->all()
            ->where('active', '1')
            ->count();
        // this is used to reference get active licensor comments

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