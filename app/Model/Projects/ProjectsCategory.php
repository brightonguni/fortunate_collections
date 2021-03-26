<?php

namespace App\Model\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\Stores;
use App\Model\Licensors\Licensor;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectsCategory extends Model
{
  use SoftDeletes;
  
    protected $table = 'projects_categories';

    protected $fillable = [
        'title',
        'avatar',
        'description',
        'active',
        'store_id',
        'licensor_id'
    ];
    public function store()
    {
      return $this->belongsTo(Stores::class,'store_id','id');
    }
    public function licensor()
    {
      return $this->belongsTo(Licensor::class,'licensor_id','id');
    }
}