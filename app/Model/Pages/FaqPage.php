<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class FaqPage extends Model
{
    protected $table = 'faq_pages';

    protected $fillable = [
      'title',
      'description',
      'active',
    ];
}