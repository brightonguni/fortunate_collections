<?php

namespace App\Model\Licensors;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customers\Wallet;
use App\Model\Licensors\Licensor;

class LicensorUser extends Model
{
    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licensor_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'licensor_id', 'user_id'
    ];


    /**
     * Fetch wallet that belongs to the user
     */
    public function licensor(){
        return $this->belongsTo(Licensor::class,'licensor_id','id');
    }



}
