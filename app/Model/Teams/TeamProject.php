<?php

namespace App\Model\Teams;

use Illuminate\Database\Eloquent\Model;

class TeamProject extends Model
{
    protected $table = "team_projects";

    protected $fillable = ['project_id', 'team_id','id'];
}