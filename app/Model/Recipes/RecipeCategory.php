<?php

namespace App\Model\Recipes;

use App\Model\Recipes\Recipe;
use App\Model\Recipes\RecipesCategory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $table = 'recipe_categories';

    protected $fillable = [
        'recipe_id', 'id', 'category_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(RecipesCategory::class, 'category_id', 'id');
    }
}
