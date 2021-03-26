<?php

use App\Model\Pages\ProductCategoryPage;
use Illuminate\Database\Seeder;

class ProductCategoryPageTableSeeder extends Seeder
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
                'title' => 'Product Categories',
                'description' => 'Enjoy our wide range of product to choose from. We are pleased to deliver all the products right to your door step ',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($categories as $category) {
            ProductCategoryPage::create($category);
        }
    }
}