<?php

namespace App\Model\Permissions;

use Illuminate\Database\Eloquent\Model;

class RolesUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */



}
