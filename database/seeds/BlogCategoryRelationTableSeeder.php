<?php

use App\Model\Blogs\BlogCategoryRelation;
use Illuminate\Database\Seeder;

// use app\Model\Blogs\BlogCategoryRelation;

class BlogCategoryRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCategoriesRe = [
            array(
                'id' => '1',
                'blog_id' => '1',
                'category_id' => '1',
            ),
            array(
                'id' => '2',
                'blog_id' => '1',
                'category_id' => '1'),
        ];
        foreach ($blogCategoriesRe as $category) {
            BlogCategoryRelation::create($category);
        }
    }
}