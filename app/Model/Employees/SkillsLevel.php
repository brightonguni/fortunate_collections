<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;

class SkillsLevel extends Model
{
    protected $table = 'skills_levels';

    protected $fillable = ['name','description','active'];
}