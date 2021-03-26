<?php

namespace App\Model\Services;

use Illuminate\Database\Eloquent\Model;
use App\Model\Services\ServiceCategory;
use App\Model\Services\Service;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $fillable = [
        'service_id', 'category_id', 'id',
    ];

     public function category()
     {
         return $this->belongsTo(ServiceCategory::class, 'category_id', 'id');
     }
    public function service()
     {
        return $this->belongsTo(Service::class, 'service_id', 'id');
     }
}