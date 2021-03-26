<?php

namespace App\Model\Recipes;

use Illuminate\Database\Eloquent\Model;
use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;

class RecipesCategory extends Model
{
    protected $table = 'recipes_categories';

    protected $fillable = ['title', 'description', 'active', 'avatar','store_id','licensor_id'];

    /**
     * Get store or business that belongs to the project
     */
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
    public function licensor()
    {
        return $this->belongsTo(Licensor::class, 'licensor_id', 'id');
    }
}