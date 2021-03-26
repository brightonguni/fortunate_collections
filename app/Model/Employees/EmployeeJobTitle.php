<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use App\Model\Permissions\Roleuser;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeJobTitle extends Model
{
  use SoftDeletes;

    protected $table = "employee_job_titles";

    protected $fillable = [ 'employee_id, job_title_id'];


    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
