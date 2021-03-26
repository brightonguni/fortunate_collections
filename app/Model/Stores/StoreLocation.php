<?php
namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Stores\Stores;
use App\Model\Stores\Locations;

class StoreLocation extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores_locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'location_id', 'store_id',
    ];
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'location_id', 'id');
    }

    public function store()
    {
        return $this->hasOne(Stores::class, 'store_id', 'id');
    }
}