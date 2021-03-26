<?php

namespace App\Model\Stores;

use App\Model\Stores\Stores;
use App\User;
use Illuminate\Database\Eloquent\Model;

class StoreUser extends Model
{
    protected $table = 'store_users';

    protected $fillable = ['user_id', 'store_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
}