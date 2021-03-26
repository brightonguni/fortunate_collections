<?php

namespace App\Model\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectService extends Model
{
  use softDeletes;
  
    protected $table = 'project_services';

    protected $fillable = ['service_id', 'project_id','id'];
}