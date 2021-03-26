<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class BlogCommentUser extends Model
{
    protected $table = 'blog_comments_users';

    protected $fillable = [
        'blog_id',
        'comment_id',
        'user_id',
    ];
}