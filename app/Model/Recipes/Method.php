<?php

namespace App\Model\Recipes;
use App\Model\Recipes\Recipe;
use Illuminate\Database\Eloquent\Model;
use App\Model\Stores\Stores;
use App\Model\Licensors\Licensor;

class Method extends Model
{
    protected $table = 'methods';
    
    protected $fillable = ['recipe_id','description','active','licensor_id','store_id'];

    public function recipe()
    {
      return $this->belongsTo(Recipe::class,'recipe_id','id'); 
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