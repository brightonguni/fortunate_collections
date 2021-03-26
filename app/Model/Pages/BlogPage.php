<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class BlogPage extends Model
{
    protected $table = 'blog_pages';

    protected $fillable = [
      'title',
      'description',
      'active',
    ];
}