<?php

namespace App\Model\Services;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    protected $table = 'services_categories';

    protected $fillable = [
        'title',
        'description',
        'categories',
        'active',
        'avatar',
        'store_id',
        'licensor_id'];

    public function services()
    {
        return $this->belongsToMany(ServicesCategory::class, 'service_categories', 'service_id', 'category_id');
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