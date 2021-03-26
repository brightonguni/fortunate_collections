<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $table = 'service_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}