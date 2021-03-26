<?php

namespace App\Model\Bookings;

use App\Model\Bookings\Event;
use App\Model\Bookings\Venue;
use App\Model\Licensors\Licensor;
use App\Model\Products\Product;
use App\Model\Services\Service;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'venue_id',
        'store_id',
        'licensor_id',
        'service_id',
        'active',
        // 'product_id',
        'avatar',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}