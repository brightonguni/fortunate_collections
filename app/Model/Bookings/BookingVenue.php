<?php

namespace App\Model\Bookings;

use Illuminate\Database\Eloquent\Model;

class BookingVenue extends Model
{
    protected $table = 'booking_venues';

    protected $fillable = ['booking_id','venue_id'
  
  ];
}
