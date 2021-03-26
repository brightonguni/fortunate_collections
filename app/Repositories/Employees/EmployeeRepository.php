<?php

namespace App\Repositories\Employees;

use App\Entities\Employees\Form;
use App\Helpers\RepositoryInterface;
use App\Helpers\Statistics;
use App\Model\Customers\StoreUser;
use App\Model\Employees\Employee;
use App\Model\Licensors\Licensor;
use App\Model\Licensors\LicensorUser;
use App\Model\Permissions\Role;
use App\Model\Stores\Stores;
use App\Repositories\Departments\DepartmentsRepository;
use App\Repositories\Employees\ContractsRepository;
use App\Repositories\Employees\ContractTypesRepository;
use App\Repositories\Employees\JobTitlesRepository;
use App\Repositories\Licensors\LicensorRepository;
use App\Repositories\Projects\ProjectRepository;
use App\Repositories\Skills\SkillsRepository;
use App\Repositories\Teams\TeamRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

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
        return Employee::find($id);
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
        // $role = Employee::find(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        // show Employees based on logged in user
        if ($role == 1) {
            return Employee::all()->sortBy('id');
        } elseif ($role == 3) {
        } elseif ($role == 4) {
            $licensor_id = Employee::find(Auth::user()->id)->licensorUser()->licensor_id;
            return Licensor::find($licensor_id)->Employees()->get()->sortBy('id');
        }
        return [];
    }
    public function trash()
    {
        // $role = Employee::find(Auth::user()->id)->role()->id;
        $role = Auth::user()->role->id;

        // show Employees based on logged in user
        if ($role == 1) {
            return Employee::onlyTrashed()->get()->sortByDesc('created_at');
        } elseif ($role == 3) {
        } elseif ($role == 4) {
            $licensor_id = Employee::find(Auth::user()->id)->licensorUser()->licensor_id;
            return Licensor::find($licensor_id)->Employees()->onlyTrashed()->get();
        }

        return [];
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        Employee::destroy($id);
    }
    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        $validation = self::validateEmployee($data);
        // $employee::where('id', $id)->first();
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput(self::submission());
        }
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        //
        if (!isset($data['active'])) {
            $data['active'] = 0;
        }
        $employee = Employee::where('id', $id)->first();
        $employee->name = $data['name'];
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->role_id = $data['role_id'];
        $employee->contract_id = $data['contract_id'];
        $employee->contract_type_id = $data['contract_type_id'];
        $employee->department_id = $data['department_id'];
        $employee->email = $data['email'];
        $employee->active = $data['active'];
        $employee->phone = $data['phone'];
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
            $employee->password = $data['password'];
        }
        $employee->save();
        $userstores = StoreUser::where('user_id', $employee->id)->first();
        if (self::is_bussines($data)) {
            if ($userstores) {
                $userstores->store_id = $data['store'];
                $userstores->save();
            } else {
                StoreUser::create([
                    'user_id' => $Employee->id,
                    'store_id' => $data['store'],
                ]);
            }
        } else {
            if ($userstores) {
                $userstores->delete();
            }
        }
        if (isset($data['licensor_id'])) {
            LicensorUsers::where('user_id', $id)->update(['licensor_id' => $data['licensor_id']]);

            //  }
            # create licensor user

        }
        return redirect('employees/' . $id)->with('success', 'You have successfully updated the following user: ' . $data['name']);
    }
    private function validateEmployee($data)
    {
        $rules = [
            "first_name" => "required",
            "last_name" => "required",
            "licensor_id" => 'required',
            'role_id' => 'required',
            "email" => 'required|email|max:255',
            "phone" => 'required|regex:/(0)[0-9]{9}/',
            'active' => 'required',
        ];

        if (request()->has('role_id')) {
            if (self::is_bussines($data)) {
                $rules['store'] = 'required|numeric';
            }
        }
        $validator = tap(Validator::make($data, $rules), function () {

            if (request()->has('active')) {
                Validator::make(request()->all(), [
                    'active' => 'active|numeric',
                ]);
            }
            $phone = str_replace(' ', '', request()->get('phone'));
            if (request()->has('phone')) {
                Validator::make(['phone' => $phone], [
                    'phone' => 'required|regex:/(0)[0-9]{9}/',
                ]);
            }
        });
        return $validator;
    }

    private function is_bussines($data)
    {
        $roles = Role::where('id', $data['role_id'])->first();
        if ($roles) {
            if ($roles->name == 'Business') {
                return true;
            }
        }
        return false;
    }

    public function store(array $user)
    {
        if (self::is_valid()) {
            # create new store
            $user['name'] = $user['first_name'] . ' ' . $user['last_name'];
            $user['password'] = Hash::make($user['password']);
            $new_user = Employee::create($user);

            if ($user['licensor_id']) {
                LicensorUser::create([
                    'licensor_id' => $user['licensor_id'],
                    'user_id' => $new_user->id,

                ]);
            }
            # create licensor user
            return redirect('users/' . $new_user->id)->with('success', 'You have successfully created the following user: ' . $user['name']);
        }
        return redirect()->back()->withErrors(self::errors())->withInput(self::submission());
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
    public function getTeams()
    {
        return App::Make(TeamRepository::class)->all()->pluck('name', 'id');
    }
    // probably should be a helper / middleware
    public function userBelongsToLicensor($employee_id)
    {
        $licensorUser = Employee::find(Auth::user()->id)->licensorUser();
        return (LicensorUsers::where(['user_id' => $employee_id, 'licensor_id' => $licensorUser->licensor_id])->first()) ? true : false;
    }
    public function userIsLicensor()
    {
        $employee = Employee::find(Auth::user()->id);
        return ($employee->role()->name === 'Licensor') ? true : false;
    }
    public function apiUserNotAdmin()
    {
        $employee = Employee::find(auth()->guard('api')->user()->id);
        return $employee->role()->name !== 'Administrator';
    }
    public function userIsNotAdmin()
    {
        $employee = Employee::find(Auth::user()->id);
        return $employee->role()->name !== 'Administrator';
    }
    public function getRoles()
    {
        return Role::all();
    }
}