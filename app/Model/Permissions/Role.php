<?php

namespace App\Model\Permissions;

use App\Model\Permissions\Permission;
use App\Model\Permissions\PermissionsRole;
use App\Model\Permissions\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function permissionRoles()
    {
        return $this->hasMany(PermissionsRole::class, 'role_id');
    }

    public function canDo($permission_name)
    {
        $perm = Permission::where('name', $permission_name)->first();
        if (!$perm) {
            return false;
        }

        $permRole = PermissionsRole::where(['role_id' => auth()->user()->role_id, 'permission_id' => $perm->id])->first();
        if (!$permRole) {
            return false;
        }

        return true;

    }

    public function canDoAll()
    {
        return $this->permissions()->pluck('name')->toArray();
    }

    public function roleHasAPermission($user, $permission_name)
    {

        $id = $user->role_id;

        $role = Role::where('id', $id)->first();
        $permission = Permission::where('name', $permission_name)->first();
        if (!$permission) {
            return false;
        }
        $permission_id = $permission->id;
        $permission_r = PermissionsRole::where(['role_id' => $role->id, 'permission_id' => $permission_id])->first();
        if ($permission_r) {
            return true;
        }
        return false;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles')->withTimestamps();
    }

}
