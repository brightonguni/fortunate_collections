<?php

namespace App\Model\Services;

use App\Model\Bookings\Event;
use App\Model\Products\Product;
use App\Model\Stores\Stores;
use App\Model\Projects\Project;
use App\Model\Services\ServicesCategory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'categories',
        'active',
        'avatar',
        'store_id',
        'licensor_id',
        //'category_id',

    ];
    public function categories()
    {
        return $this->belongsToMany(ServicesCategory::class, 'service_categories', 'service_id', 'category_id');
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'service_products', 'product_id', 'service_id');
    }
    public function project()
    {
        return $this->belongsToMany(Project::class, 'service_projects', 'project_id', 'service_id');
    }
    // public function projects()
    // {
    //     return $this->hasMany(Project::class, 'store_id', 'id');
    // }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'service_products', 'product_id', 'service_id');
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id', 'id');
    }
    /**
     * Get store or business that belongs to the project
     */
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }

}