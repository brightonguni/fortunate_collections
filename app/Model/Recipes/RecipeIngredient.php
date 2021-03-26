<?php

namespace App\Model\Recipes;

use Illuminate\Database\Eloquent\Model;
use App\Model\Recipes\Ingredient;
use App\Model\Recipes\Recipe;

class RecipeIngredient extends Model
{
   protected $table = 'recipe_ingredients';

   protected $fillable = [ 'recipe_id','ingredient_id','id'];

   public function recipe()
   {
     return $this->belongsTo(Recipe::class,'recipe_id','id');
   }
   public function ingredient()
   {
     return $this->belongsTo(Ingredient::class,'ingredient_id','id');
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