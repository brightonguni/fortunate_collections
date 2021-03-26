<?php

namespace App\Model\FAQ;

use Illuminate\Database\Eloquent\Model;

class FaqsCategory extends Model
{
    protected $table = 'faqs_categories';

    protected $fillable = ['category_id', 'faq_id', 'id'];
}