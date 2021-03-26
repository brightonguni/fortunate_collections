<?php
namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreCategory extends Model
{
    use SoftDeletes;
    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'store_id',
    ];

    
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function bank()
    {
        return $this->belongsTo(StoresCategory::class, 'category_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

}