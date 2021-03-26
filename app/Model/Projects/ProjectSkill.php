<?php

namespace App\Model\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSkill extends Model
{
   use SoftDeletes;
   
    protected $table = "project_skills";

    protected $fillable = ['id', 'project_id', 'skill_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}