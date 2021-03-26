<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;

class ProductEvent extends Model
{
    protected $table = 'product_events';

    protected $fillable = [
      'product_id', 'id','event_id',
    ];
}