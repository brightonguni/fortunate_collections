<?php

use App\Model\Services\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = [
            array(
                'id' => '1',
                'title' => 'T-shirt Printing',
                'active' => '1',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'avatar' => 'printing.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

            array(
                'id' => '2',
                'title' => 'Deliveries',
                'active' => '1',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'avatar' => 'deliveries.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'Shipping',
                'active' => '1',
                'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.",
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'shipping.jpg',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];

        foreach ($services as $service) {
            Service::create($service);
        }

    }
}