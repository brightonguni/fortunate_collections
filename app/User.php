<?php

namespace App;

use App\Model\Blogs\Blog;
use App\Model\CaseStudies\CaseStudy;
use App\Model\Employees\Contract;
use App\Model\Employees\Department;
use App\Model\Employees\EmployeesCategory;
use App\Model\Employees\Skill;
use App\Model\Licensors\licensorUser;
use App\Model\Permissions\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
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
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(EmployeesCategory::class, 'category_id', 'id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function licensorUser()
    {
        return $this->belongsTo(licensorUser::class, 'id', 'user_id')->first();
    }
    /**
     * Fetch wallet that belongs to the user
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }

    public function caseStudy()
    {
        return $this->hasMany(CaseStudy::class, 'user_id', 'id');
    }

    /**
     * Fetch wallet that belongs to the user
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'cards_users', 'user_id', 'card_id');
    }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class, 'role_id', 'id')->first();
    // }
    public function store()
    {
        return $this->hasOne(StoreUser::class, 'user_id');
    }

    // public function licensorUser()
    // {
    //     return $this->belongsTo(\App\Licensor\Model\LicensorUsers::class, 'id', 'user_id')->first();
    // }

    public function hasLicensor()
    {
        return $this->belongsTo(LicensorUsers::class, 'id', 'user_id')->first();
    }

    public function licensor()
    {
        return $this->belongsTo(LicensorUsers::class, 'id', 'user_id')->first()->licensor();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

}