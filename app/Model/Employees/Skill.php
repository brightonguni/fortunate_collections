<?php

namespace App\Model\Employees;

use App\Model\Licensors\Licensor;
use App\Model\Permissions\RoleUser;
use App\Model\Stores\Stores;
use App\Model\Employees\SkillsLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $table = "skills";

    protected $fillable = ['name', 'description', 'active', 'level_id',
        'experience', 'store_id', 'licensor_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function level()
    {
        return $this->belongsTo(SkillsLevel::class, 'level_id', 'id');
    }

}