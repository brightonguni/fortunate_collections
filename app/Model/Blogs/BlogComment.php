<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'blog_comments';

    protected $fillable = [
        'blog_id',
        'comment_id',
        'user_id',
        'id',
        
    ];
}