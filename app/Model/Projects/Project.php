<?php

namespace App\Model\Projects;

use App\Model\Employees\Skill;
use App\Model\Employees\Team;
use App\Model\Licensors\Licensor;
use App\Model\Projects\ProjectsCategory;
use App\Model\Projects\ProjectSubCategory;
use App\Model\Services\Service;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'store_id',
        'licensor_id',
        'active',
        'services',
        'categories',
        'sub_categories',
        'skills',
        'start_date',
        'end_date',
        'avatar',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function categories()
    {
        return $this->belongsToMany(ProjectsCategory::class, 'project_categories', 'category_id', 'project_id', 'id');
    }
    public function sub_categories()
    {
        return $this->belongsToMany(ProjectSubCategory::class, 'projects_sub_categories', 'sub_category_id', 'project_id', 'id');
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'project_teams', 'team_id', 'project_id');
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skills', 'skill_id', 'project_id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'project_services', 'service_id', 'project_id');
    }
    public function category()
    {
        return $this->belongsTo(ProjectsCategory::class, 'category_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * get the team that belongs to the project
     * **/

    public function team()
    {
        return $this->hasMany(Team::class, 'project_teams', 'project_id', 'team_id');
    }
    // public function team()
    // {
    //     return $this->belongsTo(Team::class, 'team_id', 'id');
    // }
    /**
     * Get store or business that belongs to the project
     */
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}