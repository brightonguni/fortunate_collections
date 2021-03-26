<?php

namespace App\Model\Employees;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeProjects extends Model
{
    use SoftDeletes;

    protected $table = "employee_projects";

    protected $fillable = ['employee_id', 'project_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
