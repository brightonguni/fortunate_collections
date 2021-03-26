<?php

namespace App\Model\Blogs;

use App\Model\Blogs\Blog;
use App\Model\Blogs\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'blog_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
