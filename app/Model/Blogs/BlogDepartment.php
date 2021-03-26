<?php

namespace App\Model\Blogs;

use App\Model\Blogs\BlogDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogDepartment extends Model
{
    use SoftDeletes;

    protected $table = 'blog_departments';

    protected $fillable = [
        'blog_id', 'id', 'department_id',
    ];

     public function blog()
    {
      return $this->belongsTo(Blog::class,'blogs_departments','blog_id','id');
    }

    public function departments()
    {
      return $this->belongsTo(Department::class,'blogs_department','department_id','id');
     
    }
}