<?php

use App\Model\Blogs\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [
            array(
                'id' => '1',
                'user_id' => '2',
                'title' => 'Manux food trailer will be pop in  and festivals with a new unique method of cooking',
                'description' => 'Manux food trailer will be pop in  and festivals with a new unique method of cooking so will be specializing with sous vide method  our free range chicken breast and beef patties cooking in their juices with some spring of thyme ,rosemary and garlic so that when you have to eat it you  taste the succulent juices of the meat  and we are the 1st in cape town to bring the method of sous vide in a mobile kitchen ',
                'avatar' => '28.jpg',
                'category_id' => '1',
                'Store_id' => '1',
                'Licensor_id' => '1',
                'department_id' => '1',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'user_id' => '1',
                'title' => 'Need to make a splash at a big upcoming event? Manux food truck can help with catering.',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?",
                'avatar' => 'make-up.jpg',
                'category_id' => '2',
                'Store_id' => '1',
                'Licensor_id' => '1',
                'department_id' => '2',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'user_id' => '2',
                'title' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text  specimen",
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?",
                'avatar' => 'men-t-shirt-tupac-pict.jpeg',
                'category_id' => '4',
                'active' => '1',
                'Store_id' => '1',
                'department_id' => '3',
                'Licensor_id' => '1',
                'created_at' => '2020-08-16 00:00:00',
                'updated_at' => '2020-08-16 00:00:00',
            ),
            array(
                'id' => '4',
                'user_id' => '2',
                'title' => 'where would you want #manux-kitchens to explore their expertise in the cooking industry',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?",
                'avatar' => 'lingeri.jpeg',
                'category_id' => '1',
                'active' => '1',
                'Store_id' => '1',
                'department_id' => '3',
                'Licensor_id' => '1',
                'created_at' => '2020-05-06 00:00:00',
                'updated_at' => '2020-05-06 00:00:00',
            ),

            array(
                'id' => '5',
                'user_id' => '2',
                'title' => 'What is sous vide? #manux-kitchens',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?",
                'avatar' => 'leddies-trouse.jpeg',
                'category_id' => '1',
                'active' => '1',
                'Store_id' => '1',
                'department_id' => '3',
                'Licensor_id' => '1',
                'created_at' => '2020-08-17 00:00:00',
                'updated_at' => '2020-08-17 00:00:00',
            ),
            array(
                'id' => '6',
                'user_id' => '2',
                'title' => 'Cocktail parties and year end function',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?",
                'avatar' => 'men-jeans-tone.jpeg',
                'category_id' => '1',
                'active' => '1',
                'Store_id' => '1',
                'department_id' => '3',
                'Licensor_id' => '1',
                'created_at' => '2020-08-22 00:00:00',
                'updated_at' => '2020-08-22 00:00:00',
            ),

        ];
        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}