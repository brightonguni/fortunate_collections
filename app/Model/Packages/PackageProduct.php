<?php

namespace App\Model\Packages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Packages\Package;
use App\Model\Products\Product;

class PackageProduct extends Model
{
    use SoftDeletes;

    protected $table = 'package_products';

    protected $fillable = ['package_id', 'product_id', 'id'];

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

}