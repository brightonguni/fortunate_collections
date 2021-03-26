<?php

namespace App\Model\Bookings;

use App\Model\Bookings\BookingCategory;
use App\Model\Bookings\Event;
use App\Model\Bookings\Venue;
use App\Model\Services\Service;
use App\Model\Stores\Stores;
use App\Model\Licensors\Licensor;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'event_id',
        'service_id',
        'user_id',
        'description',
        'licensor_id',
        'store_id',
        'category_id',
        // 'product_id',
        'active',

    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BookingCategory::class, 'category_id','id');
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