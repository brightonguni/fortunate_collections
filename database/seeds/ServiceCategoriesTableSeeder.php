<?php

use App\Model\Services\ServicesCategory;
use Illuminate\Database\Seeder;

class ServiceCategoriesTableSeeder extends Seeder
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
                'title' => 'T-Shirt Printing',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'printing.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
            ),

            array(
                'id' => '2',
                'title' => 'Shipping',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'shipping.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
            ),

            array(
                'id' => '3',
                'title' => 'Door to Door Deliveries',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'deliveries.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
            ),

        ];
        foreach ($categories as $category) {
            ServicesCategory::create($category);
        }
    }
}