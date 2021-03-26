<?php

namespace App\Model\Products;

use App\Model\Products\Brand;
use App\Model\Products\Product;
use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $table = 'product_brands';

    protected $fillable = ['product_id', 'brand_id', 'id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}