<?php

use App\Model\Projects\ProjectsCategory;
use Illuminate\Database\Seeder;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            array(
                'id' => '1',
                'title' => 'silver',
                'description' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.you will receive an instance of Illuminate\Pagination\Paginator. These objects provide several methods that describe the result ',
                'active' => '1',
                'avatar' => 'manux-breakfast.jpg',
            ),
            array(
                'id' => '2',
                'title' => 'diamond',
                'description' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.you will receive an instance of Illuminate\Pagination\Paginator. These objects provide several methods that describe the result ',
                'active' => '1',
                'avatar' => 'manux-blog-me.jpg',
            ),
            array(
                'id' => '3',
                'title' => 'platinum',
                'description' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.you will receive an instance of Illuminate\Pagination\Paginator. These objects provide several methods that describe the result ',
                'active' => '1',
                'avatar' => 'manux-blogging.jpg',
            ),

        ];
        foreach ($categories as $category) {
            ProjectsCategory::create($category);
        }
    }
}