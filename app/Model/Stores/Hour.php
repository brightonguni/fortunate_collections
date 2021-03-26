<?php
namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{

    /**Category StoreHour
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hours';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id',
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

}
