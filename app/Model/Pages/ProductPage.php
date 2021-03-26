<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class ProductPage extends Model
{
    protected $table = 'product_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}