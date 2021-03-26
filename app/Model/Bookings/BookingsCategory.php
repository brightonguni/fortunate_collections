<?php

namespace App\Model\Bookings;

use Illuminate\Database\Eloquent\Model;

class BookingsCategory extends Model
{
    protected $table = 'bookings_categories';

    protected $fillable = [
        'booking_id', 'category_id','id'
    ];
}