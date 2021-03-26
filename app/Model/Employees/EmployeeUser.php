<?php

namespace App\Model\Employees;

use App\Model\Employees\Employee;
use App\Model\Employees\EmployeeUser;
use Illuminate\Database\Eloquent\Model;

class EmployeeUser extends Model
{
    protected $table = "employee_users";

    protected $fillable = [
        'employee_id', 'user_id',
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}