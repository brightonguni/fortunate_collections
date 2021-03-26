<?php

namespace App\Model\Permissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'description'
    ];

    public function permissionRoles()
    {
        return $this->hasMany(PermissionsRole::class, 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
