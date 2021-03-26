<?php

namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProject extends Model
{
    use SoftDeletes;

    protected $table = "store_projects";

    protected $fillable = ['id', 'store_id', 'project_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
