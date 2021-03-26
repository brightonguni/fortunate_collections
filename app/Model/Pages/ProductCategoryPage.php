<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryPage extends Model
{
    protected $table = 'product_category_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}