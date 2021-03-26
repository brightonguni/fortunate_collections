<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeContact extends Model
{
    use SoftDeletes;

    protected $table = "employee_contacts";

    protected $fillable = [
        'employee_id', 'contact_address_id'
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
