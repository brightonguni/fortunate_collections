<?php

namespace App\Model\Employees;

use App\Model\Blogs\Blog;
use App\Model\Blogs\BlogDepartment;
use App\Model\CaseStudies\CaseStudy;
use App\Model\Licensors\Licensor;
use App\Model\Permissions\RoleUser;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";

    protected $fillable = ['name', 'description', 'active', 'licensor_id', 'store_id'];

    public function role()
    {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'blog_id', 'id');
    }

    public function blogs()
    {
        return $this->belongsToMany(BlogDepartment::class, 'blog_departments', 'blog_id', 'department_id');
    }
    public function casestudy()
    {
        return $this->hasMany(CaseStudy::class, 'case_study_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

}