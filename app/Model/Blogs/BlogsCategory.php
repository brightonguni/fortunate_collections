<?php

namespace App\Model\Blogs;

use App\Model\Blogs\BlogsCategory;
use Illuminate\Database\Eloquent\Model;

class BlogsCategory extends Model
{
    protected $table = 'blogs_categories';

    protected $fillable = [
        'blog_id', 'category_id', 'id',
    ];

    // public function blog()
    // {
    //     return $this->belongsTo(BlogCategory::class, 'blogs_categories', 'blog_id', 'id');
    // }

    // public function categories()
    // {
    //     return $this->belongsTo(BlogCategory::class, 'blogs_categories', 'category_id', 'id');
    // }
}