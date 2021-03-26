<?php

namespace App\Model\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'email_address',
        'first_name',
        'last_name',
        'service_id',
        'phone_number',
        'whatsApp_telephone',
        'message',
        'subject',
        'licensor_id',
        'store_id',
        'active',
    ];
}