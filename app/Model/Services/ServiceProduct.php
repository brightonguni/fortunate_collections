<?php

namespace App\Model\Services;

use App\Model\Services\ServiceProduct;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    protected $table = 'service_products';

    protected $fillable = [
        'service_id',
        'product_id',
        'id',
    ];

    // public function service()
    // {
    //     return $this->hasMany(Service::class, 'service_id', 'id');
    // }
    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'product_id', 'id');
    // }
}