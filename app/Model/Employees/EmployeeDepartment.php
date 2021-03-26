<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Permissions\RoleUser;
use App\Model\Employees\Employee;
use App\Model\Employees\Department;

class EmployeeDepartment extends Model
{
  use SoftDeletes;

    protected $table = "employee_departments";

    protected $fillable = [
        'employee_id', 'department_id'
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function employee()
    {
      return $this->belongsTo(Employee::class,'employee_id','id');
    }
    public function department()
    {
      return $this->belongsTo(Department::class,'department_id','id');
    }
}