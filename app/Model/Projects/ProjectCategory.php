<?php

namespace App\Model\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
  use SoftDeletes;
  
    protected $table = 'project_categories';

    protected $fillable = [
      'project_id','category_id','id'
    ];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}