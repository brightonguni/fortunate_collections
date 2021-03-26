<?php

namespace App\Model\Blogs;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = [
        'title',
        'description',
        'avatar',
        'active',
        'store_id',
        'licensor_id',
    ];

    public function blogs()
    {
        return $this->belongsToMany(BlogCategory::class, 'blogs_categories', 'blog_id', 'category_id');
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