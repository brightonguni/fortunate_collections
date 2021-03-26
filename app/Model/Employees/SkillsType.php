<?php

namespace App\Model\Employees;

use Illuminate\Database\Eloquent\Model;

class SkillsType extends Model
{
    protected $table = 'skills_types';

    protected $fillable = [
        'skill_id',
        'type_id',

    ];
}