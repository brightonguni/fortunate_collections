<?php
namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'google_place_id', 'lat', 'lng', 'active', 'id',
    ];
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

}
