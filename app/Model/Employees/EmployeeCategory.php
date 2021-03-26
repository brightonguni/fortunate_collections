<?php

namespace App\Model\Employees;

use App\Model\Employees\Employee;
use App\Model\Employees\EmployeesCategory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $table = 'employee_categories';

    protected $fillable = ['employee_id', 'category_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');

    }
    public function category()
    {
        return $this->belongsTo(EmployeesCategory::class, 'category_id', 'id');

    }

}