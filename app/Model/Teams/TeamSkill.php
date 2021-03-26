<?php

namespace App\Model\Teams;

use Illuminate\Database\Eloquent\Model;

class TeamSkill extends Model
{
    protected $table = "team_skills";

    protected $fillable = ['skill_id', 'team_id', 'id'];
}