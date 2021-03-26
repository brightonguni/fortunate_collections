<?php

namespace App\Model\Projects;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use App\Model\Projects\ProjectsCategory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSubCategory extends Model
{
    use softDeletes;

    protected $table = 'project_sub_categories';

    protected $fillable = ['title', 'description', 'active', 'avatar', 'store_id', 'category_id', 'sub_categories', 'licensor_id'];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(ProjectsCategory::class, 'category_id', 'id');
    }
}