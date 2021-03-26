<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;

class EmployeesContract extends Model
{
    protected $table = 'employees_contracts';

    protected $fillable = ['employee_id', 'contract_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
}