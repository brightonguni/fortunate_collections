<?php

namespace App\Model\Employees;

use App\Model\Employees\Skill;
use App\Model\Employees\SkillsLevel;
use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    protected $table = 'skill_levels';

    protected $fillable = ['skill_id', 'level_id', 'id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
    public function level()
    {
        return $this->belongsTo(SkillsLevel::class, 'level_id', 'id');
    }
}