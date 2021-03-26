<?php
namespace App\Support\Model;
use App\Permissions\Model\RoleUser;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon', 'active','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//

    /**
     * Fetch wallet that belongs to the user
     */
    public function wallet(){
        return $this->hasOne(Wallet::class,'user_id','id');
    }


    /**
     * Fetch wallet that belongs to the user
     */
    public function role(){
        return $this->hasOne(RoleUser::class,'user_id','id');
    }



}
