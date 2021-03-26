<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Permissions\RoleUser;

class EmployeeContractType extends Model
{
    protected $table = "employee_contact_types";

    protected $fillable = ['employee_id','contract_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
