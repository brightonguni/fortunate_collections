<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;

class EmployeesCategory extends Model
{
    protected $table = 'employees_categories';

    protected $fillable = [
        'title',
        'description',
        'avatar',
        'active',
        'id',
    ];
}