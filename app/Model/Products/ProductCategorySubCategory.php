<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;

class ProductCategorySubCategory extends Model
{
    protected $table = 'product_category_sub_categories';

    protected $fillable = ['category_id', 'sub_category_id', 'id'];

    public function category()
    {
        return $this->belongsTo(ProductsCategory::class, 'category_id', 'id');
    }
    public function sub_category()
    {
        return $this->belongsTo(ProductsSubCategory::class, 'sub_category_id', 'id');
    }

}