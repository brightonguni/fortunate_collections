<?php

namespace App\Model\Stores;

use App\Model\Licensors\Licensor;
use App\Model\Permissions\RoleUser;
use App\Model\Stores\Stores;
use App\User;
use Illuminate\Database\Eloquent\Model;

class StoresCategory extends Model
{
    protected $table = 'stores_categories';

    protected $fillable = ['title', 'active', 'avatar','description'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}