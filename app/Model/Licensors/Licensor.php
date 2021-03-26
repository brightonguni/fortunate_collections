<?php


namespace App\Model\Licensors;
use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use App\Model\Licensors\LicensorStore;
use App\Model\Stores\Store;
use App\Model\Customers\Customer;

class Licensor extends Model {

    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licensors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon','splash_screen','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * Fetch wallet that belongs to the user
     */
//    public function role(){
//        return $this->hasOne(RoleUser::class,'user_id','id');
//    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'licensor_stores', 'licensor_id', 'store_id');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'licensor_users', 'licensor_id', 'user_id');
    }

}
