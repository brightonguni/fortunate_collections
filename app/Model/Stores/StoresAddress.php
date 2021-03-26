<?php

namespace App\Model\Stores;

use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class StoresAddress extends Model
{
    protected $table = 'stores_addresses';

    protected $fillable = [
        'street',
        'suburb',
        'city',
        'postal_code',
        'state_province',
        'country',
        'description',
        'store_id',
        'licensor_id',
        'active',
    ];

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
    
}