<?php

namespace App\Model\Projects;

use App\Model\Permissions\RoleUser;
use App\Model\Projects\Project;
use App\Model\Teams\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTeam extends Model
{
    use SoftDeletes;

    protected $table = "project_teams";

    protected $fillable = ['id', 'project_id', 'team_id'];

    
    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

}