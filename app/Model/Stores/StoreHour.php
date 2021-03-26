<?php
namespace App\Model\Stores;
use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Stores\Stores;
use App\Model\Stores\Hour;
class StoreHour extends Model {
    use SoftDeletes;
    /**Category StoreHour
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_hours';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id','id','hour_id'
    ];
    
    public function role()
    {
        return $this->hasOne(RoleUser::class,'user_id','id');
    }
    
    public function store()
    {
        return $this->hasOne(Stores::class,'store_id','id');
    }
    public function hour(){
        return $this->hasOne(Hour::class,'hour_id','id');
    }



}