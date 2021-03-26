<?php

use App\Model\Pages\RecipePage;
use Illuminate\Database\Seeder;

class RecipePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            array(
                'id' => '1',
                'title' => 'Recipes',
                'description' => 'A recipe is a set of instructions that describes how to prepare or make something, especially a dish of prepared food. The term recipe is also used in medicine or in information technology. A doctor will usually begin a prescription with recipe, Latin for take, usually abbreviated as Rx or the equivalent symbol.',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            RecipePage::create($team);
        }
    }
}