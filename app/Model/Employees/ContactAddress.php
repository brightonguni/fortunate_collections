<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactAddress extends Model
{

    use SoftDeletes;

    protected $table = "employee_contact_address";

    protected $fillable = [
        'street', 'surbub', 'postal_code', 'province', 'country','active'
    ];

}