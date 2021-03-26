<?php

namespace App\Model\Recipes;

use App\Model\Recipes\Recipe;
use Illuminate\Database\Eloquent\Model;
use App\Model\Licensors\Licensor;
use App\Model\Stores\Stores;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = ['recipe_id', 'description','licensor_id','store_id', 'active'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
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