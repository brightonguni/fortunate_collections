<?php

namespace App\Model\Stores;

use Illuminate\Database\Eloquent\Model;

class StoresContact extends Model
{
    protected $table = 'stores_contacts';

    protected $fillable = [
        'store_id',
        'contact_id',
        'id',
    ];
    
    
}