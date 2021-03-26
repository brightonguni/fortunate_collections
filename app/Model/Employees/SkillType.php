<?php

namespace App\Model\Employees;

use App\Model\Permissions\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillType extends Model
{
    use SoftDeletes;

    protected $table = "skill_types";

    protected $fillable = ['title', 'description', 'active'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}