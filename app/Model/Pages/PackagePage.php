<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class PackagePage extends Model
{
    protected $table = 'package_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}