<?php

use App\Model\Products\ProductsCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
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
                'title' => 'Women',
                'description' => 'under wear.',
                'active' => '1',
                'avatar' => 'lingeri.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '2',
                'title' => 'Men',
                'description' => 'men cloths',
                'active' => '1',
                'avatar' => 'men.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '3',
                'title' => 'Young Women',
                'description' => 'men t jeans.',
                'active' => '1',
                'avatar' => 'lady.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '4',
                'title' => 'Laddies',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'lady-jean.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '5',
                'title' => 'kids Girls',
                'description' => 'small girls clothes.',
                'active' => '1',
                'avatar' => 'kids-dress.jpeg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '6',
                'title' => 'Make-Up ',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'make-up.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '7',
                'title' => 'Fragrances',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'fragrances.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '8',
                'title' => 'Skin-Care',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'skincare.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),
            array(
                'id' => '9',
                'title' => 'Bath and Body',
                'description' => 'laddies t jeans.',
                'active' => '1',
                'avatar' => 'bath_and_body.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
            ),

        ];
        foreach ($categories as $category) {
            ProductsCategory::create($category);
        }
    }
}