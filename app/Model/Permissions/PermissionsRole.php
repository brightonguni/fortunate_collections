<?php

namespace App\Model\Permissions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions\Permission;

class PermissionsRole extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'permission_id',
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

     public function role()
     {
         return $this->belongsTo(Role::class, 'role_id');
     }

     public function permission()
     {
         return $this->belongsTo(Permission::class, 'permission_id');
     }
}
