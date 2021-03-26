<?php

namespace App\Model\Bookings;

use Illuminate\Database\Eloquent\Model;

class BookingCategory extends Model
{
    protected $table = 'booking_categories';

    protected $fillable = [
        'title', 'description', 'status',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}