<?php

namespace App\Model\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**Category
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon', 'active', 'id',
    ];

}