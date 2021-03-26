<?php

use App\Model\FAQ\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FaqCategories = [
            array(
                'id' => '1',
                'active' => '1',
                'title' => 'Food Truck',
                'avatar' => 'manux-trailers.jpg',
                'description' => 'These are the questions and answers for our Food Truck Mobile Kitchen.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'Private Chef',
                'active' => '1',
                'avatar' => 'manux-private-chef.jpg',
                'description' => 'These are the questions and answers for our Private Chef functions.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'General',
                'active' => '1',
                'avatar' => 'burger_on_braai.jpg',
                'description' => 'All General Questions and answers.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
        ];
        foreach ($FaqCategories as $category) {
            FaqCategory::create($category);
        }

    }
}