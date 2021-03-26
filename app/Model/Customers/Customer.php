<?php

namespace App\Model\Customers;

use App\Model\Licensors\LicensorUser;
use App\Model\Orders\Order;
use App\Model\Permissions\Role;
use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use SoftDeletes, HasApiTokens;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'nationality',
        'id_number',
        'phone',
        'email',
        'activation_token',
        'minimum',
        'status',
        'maximum',
        'avatar',
        'role_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roleUser()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id')->first();
    }
    public function store()
    {
        return $this->hasOne(StoreUser::class, 'user_id');
    }

    public function licensorUser()
    {
        return $this->belongsTo(LicensorUser::class, 'id', 'user_id')->first();
    }

    public function hasLicensor()
    {
        return $this->belongsTo(LicensorUser::class, 'id', 'user_id')->first();
    }

    public function licensor()
    {
        return $this->belongsTo(LicensorUser::class, 'id', 'user_id')->first()->licensor();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

}