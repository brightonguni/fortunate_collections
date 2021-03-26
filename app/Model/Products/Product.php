<?php

namespace App\Model\Products;

use App\Model\Licensors\Licensor;
use App\Model\Products\Brand;
use App\Model\Products\Color;
use App\Model\Products\Product;
use App\Model\Products\ProductsCategory;
use App\Model\Products\ProductSubCategory;
use App\Model\Services\Service;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'sku',
        'description',
        'unit_price',
        'size',
        'color_id',
        'brand_id',
        'quantity',
        'categories',
        'sub_categories',
        'category_id',
        'store_id',
        'stock',
        'credit_price',
        'active',
        'product_avatar',
        'main_avatar',
        'avatar',
        'store_id',
        'licensor_id',

    ];
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(ProductsCategory::class, 'product_categories', 'product_id', 'category_id', 'id');
    }
    public function sub_categories()
    {
        return $this->belongsToMany(ProductSubCategory::class, 'products_sub_categories', 'product_id', 'sub_category_id', 'id');
    }
    public function sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_category_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(ProductsCategory::class, 'category_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // public function package()
    // {
    //     return $this->belongsTo(Package::class, 'package_id', 'id');
    // }
}