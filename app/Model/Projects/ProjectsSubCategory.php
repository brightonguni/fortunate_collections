<?php

namespace App\Model\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectsSubCategory extends Model
{
  use softDeletes;
  
     protected $table = 'projects_sub_categories';

    protected $fillable = [
      'project_id', 'sub_category_id','id'
    ];
}