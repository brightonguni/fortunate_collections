<?php

namespace App\Model\Recipes;

use App\Model\Licensors\Licensor;
use App\Model\Recipes\Recipe;
use App\Model\Recipes\Ingredient;
use App\Model\Recipes\Method;

use App\Model\Recipes\RecipesCategory;
use App\Model\Stores\Stores;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = [
        'store_id',
        'licensor_id',
        'category_id',
        'title',
        'description',
        'active',
        'avatar',
        'ingredients'
    ];

    public function category()
    {
        return $this->belongsTo(RecipesCategory::class, 'category_id', 'id');
    }
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
    public function ingredients()
    {
      return$this->hasMany(Ingredient::class); 
    }
    public function methods()
    {
      return$this->hasMany(Method::class); 
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