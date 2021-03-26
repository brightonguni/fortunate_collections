<?php

namespace App\Model\Blogs;

use App\Model\Blogs\BlogCategory;
use App\Model\Employees\Department;
use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use softDeletes;

    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'avatar',
        'title',
        'description',
        'categories',
        'category_id',
        'active',
        'departments',
        'store_id',
        'licensor_id',
        'department_id',
        //'departments'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'blog_departments', 'blog_id', 'department_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blogs_categories', 'blog_id', 'category_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}