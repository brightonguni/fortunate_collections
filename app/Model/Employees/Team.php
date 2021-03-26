<?php

namespace App\Model\Employees;

use App\Model\Employees\Department;
use App\Model\Employees\Employee;
use App\Model\Employees\Skill;
use App\Model\licensors\licensor;
use App\Model\Projects\Project;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'teams';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'title',
        'description',
        'store_id',
        'licensor_id',
        'employees',
        'skills',
        'projects',

    ];
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'team_employees', 'employee_id', 'team_id', 'id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'team_projects', 'team_id', 'project_id', 'id');
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'team_skills', 'team_id', 'skill_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    /**
     * get the team that belongs to the project
     * **/

    public function project()
    {
        return $this->belongsTo(Project::class, 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    /**
     * Get the RelationshipName that owns the Team.
     *
     * @return QueryBuilder Object
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

}