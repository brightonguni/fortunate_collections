<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'description',
        'active',
        'avatar',
        'store_id',
        'licensor_id',
    ];
}