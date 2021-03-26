<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    protected $table = 'blog_users';

    protected $fillable = [
        'blog_id', 'user_id','id'
    ];

}