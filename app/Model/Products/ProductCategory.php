<?php

namespace App\Model\Products;

use App\Model\Products\Product;
use App\Model\Products\ProductsCategory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = [
        'product_id', 'id', 'category_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductsCategory::class, 'category_id', 'id');
    }
   
}