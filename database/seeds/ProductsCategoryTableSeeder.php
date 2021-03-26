<?php

use App\Model\Products\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsCategoryTableSeeder extends Seeder
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
                'category_id' => '1',
                'product_id' => '1',
            ),
            
        ];
        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}