<?php

namespace App\Support\Resources;

use App\Repositories\categories\CategoryRepository;
use Illuminate\Support\Facades\App;

trait hasCategories
{

    public function findCategoryByID($id)
    {
        return App::make(CategoryRepository::class)->get($id);
    }

    public function getAllCategories()
    {
        return App::make(CategoryRepository::class)->all();
    }
}
