<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
   protected $table = 'contact_pages';

    protected $fillable = [
      'title',
      'description',
      'active',
      'banner_image'
    ];
}