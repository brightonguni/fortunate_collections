<?php

namespace App\Model\Bookings;

use Illuminate\Database\Eloquent\Model;

class BookingEvent extends Model
{
    protected $table = 'booking_events';

    protected $fillable = [
    	'booking_id', 'event_id'
    ];
}
