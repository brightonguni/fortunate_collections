<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';

    protected $fillable = ['product_id', 'color_id', 'id'];
}
