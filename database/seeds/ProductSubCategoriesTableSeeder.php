<?php

use Illuminate\Database\Seeder;
use App\Model\Products\ProductSubCategory;
class ProductSubCategoriesTableSeeder extends Seeder
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
                'title' => 'lingeri',
                'description' => 'under wear.',
                'active' => '1',
                'avatar' => 'lingeri.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '2',
                'title' => 'Suite',
                'description' => 'suites',
                'active' => '1',
                'avatar' => 'men.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '3',
                'title' => 'Shoes',
                'description' => 'men t jeans.',
                'active' => '1',
                'avatar' => 'lady.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '4',
                'title' => 'hat',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'lady-jean.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '5',
                'title' => 'lotion',
                'description' => 'small girls clothes.',
                'active' => '1',
                'avatar' => 'kids-dress.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '6',
                'title' => 'casual',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'make-up.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '7',
                'title' => 'sport',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'fragrances.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '8',
                'title' => 'denim',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'fragrances.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '9',
                'title' => 'formal',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'fragrances.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),

        ];
        foreach ($categories as $category) {
            ProductSubCategory::create($category);
        }
    }
}