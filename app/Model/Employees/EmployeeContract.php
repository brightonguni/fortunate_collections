<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Employees\Employee;
use App\Model\Employees\Department;

class EmployeeContract extends Model
{
    protected $table ="employee_contracts";

    protected $fillable = [ 'employee_id','contract_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function employee()
    {
      return $this->belongsTo(Employee::class,'employee_id','id');
    }
    public function contract()
    {
      return $this->belongsTo(Contract::class,'contract_id','id');
    }
}