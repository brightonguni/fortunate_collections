<?php

namespace App\Model\Employees;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = "contracts";

    protected $fillable = ['name', 'description', 'active', 'duration'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}