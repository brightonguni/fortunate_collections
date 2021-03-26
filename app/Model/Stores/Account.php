<?php
namespace App\Model\Stores;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\Stores;
use App\Model\Stores\Bank;


class Account extends Model
{

    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_name', 'account_number', 'bank_id', 'account_type', 'active','store_id'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
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
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

    /**
     * Fetch wallet that belongs to the user
     */
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

}