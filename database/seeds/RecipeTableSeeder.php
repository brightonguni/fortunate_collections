<?php

use App\Model\Recipes\Recipe;
use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = [
            array(
                'id' => '1',
                'title' => 'sous vide brisket',
                'store_id' => '1',
                'licensor_id' => '1',
                'active' => '1',
                'category_id' => '1',
                'avatar' => 'sous-vide-brisket.jpeg',
            ),
            array(
                'id' => '2',
                'title' => 'home made pasta',
                'store_id' => '1',
                'licensor_id' => '1',
                'active' => '1',
                'category_id' => '2',
                'avatar' => 'home-made-pasta.jpeg',
            ),
            array(
                'id' => '3',
                'title' => 'Carrot Cake',
                'store_id' => '1',
                'licensor_id' => '1',
                'active' => '1',
                'category_id' => '2',
                'avatar' => 'cake-carrot.jpeg',
            ),
            array(
                'id' => '4',
                'title' => 'Chinese Pork Ribs Recipe',
                'store_id' => '1',
                'licensor_id' => '1',
                'active' => '1',
                'category_id' => '1',
                'avatar' => 'ribs.jpeg',
            ),
        ];
        foreach ($recipes as $key => $recipe) {
            Recipe::create($recipe);
        }
    }
}