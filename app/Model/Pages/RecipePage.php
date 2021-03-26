<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class RecipePage extends Model
{
    protected $table = 'recipe_pages';

    protected $fillable = [
        'title',
        'description',
        'active',
    ];
}