<?php

namespace App\Model\Products;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use App\Model\Products\ProductsCategory;
use App\Model\Products\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
  use SoftDeletes;
  
    protected $table = 'product_sub_categories';

    protected $fillable = ['title', 'description', 'active', 'avatar', 'category_id','store_id', 'licensor_id'];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(ProductsCategory::class, 'category_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}