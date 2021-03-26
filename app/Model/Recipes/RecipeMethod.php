<?php

namespace App\Model\Recipes;

use App\Model\Recipes\Method;
use App\Model\Recipes\Recipe;
use Illuminate\Database\Eloquent\Model;

class RecipeMethod extends Model
{
    protected $table = 'recipe_methods';

    protected $fillable = ['recipe_id', 'method_id', 'id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
    public function ingredient()
    {
        return $this->belongsTo(Method::class, 'method_id', 'id');
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