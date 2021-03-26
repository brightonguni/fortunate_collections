<?php

namespace App\Model\Customers;

use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\Store;

class StoreUser extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id', 'user_id',
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


    public function store()
    {
        return $this->belongsTo(Store::class,'id','store_id');
    }

    public function user()
    {
        return $this->belongsTo(Customer::class,'id','user_id');
    }
}
