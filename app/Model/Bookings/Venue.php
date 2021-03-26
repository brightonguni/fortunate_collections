<?php

namespace App\Model\Bookings;

use App\Model\Bookings\Venue;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';

    protected $fillable = [

        'title',
        'street',
        'suburb',
        'city',
        'postal_code',
        'state_province',
        'country',
        'description',
        'licensor_id',
        'store_id',
        'active',
        'avatar',
    ];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id');
    }
}