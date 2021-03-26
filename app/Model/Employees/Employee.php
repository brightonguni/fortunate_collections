<?php

namespace App\Model\Employees;

use App\Model\Employees\Contract;
use App\Model\Employees\Employee;
use App\Model\Employees\EmployeesCategory;
use App\Model\Employees\Skill;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\RoleUser;
use App\Model\Stores\Stores;
use App\Model\Teams\Team;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "employees";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'department_id',
        'category_id',
        'skill_duration',
        'store_id',
        'licensor_id',
        'contract_id',
        'status',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'employee_teams', 'employee_id', 'team_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_projects', 'employee_id', 'project_id');
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'employee_skills', 'employee_id', 'skill_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id');
    }
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(EmployeesCategory::class, 'category_id', 'id');
    }

}