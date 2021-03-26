<?php

namespace App\Model\Packages;

use App\Model\Licensors\Licensor;
use App\Model\Products\Product;
use App\Model\Services\Service;
use App\Model\Packages\PackagesCategory;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = ['name', 'avatar', 'products', 'services', 'description', 'package_price', 'active', 'licensor_id', 'store_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'package_products', 'product_id', 'package_id','id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_services', 'service_id', 'package_id','id');
    }
    public function package_categories()
    {
        return $this->belongsToMany(PackagesCategory::class, 'package_categories', 'package_id', 'category_id','id');
    }


    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}