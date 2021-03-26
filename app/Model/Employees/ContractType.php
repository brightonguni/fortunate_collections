<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Permissions\RoleUser;

class ContractType extends Model
{
  use SoftDeletes;
  
    protected $table ="contract_types";

    protected $fillable = [ 'name', 'description','active','duration'];


    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
