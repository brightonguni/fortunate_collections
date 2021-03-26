<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products\ProductsSubCategory;
use App\Model\Products\ProductsCategory;
use App\Model\Products\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductsSubCategory extends Model
{
  use softDeletes;
  
    protected $table = 'products_sub_categories';

    protected $fillable = [
      'category_id', 'id','sub_category_id','product_id'
    ];

    public function category()
    {
      return $this->belongsTo(ProductsCategory::class,'category_id','id');
    }
    public function sub_category()
    {
      return $this->belongsTo(ProductSubCategory::class,'Sub_category_id','id');
    }
    public function product()
    {
      return $this->belongsTo(Product::class,'product_id','id');
    }
}