<?php

namespace App\Model\Employees;

use App\Model\Employees\Employee;
use App\Model\Employees\Skill;
use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSkills extends Model
{
    use SoftDeletes;

    /**Skills
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skill_id', 'employee_id',
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}