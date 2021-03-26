<?php

use App\Model\Bookings\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            array(
                'id' => '1',
                'title' => 'The wedding ceremony',
                'venue_id' => '1',
                'service_id' => '2',
                'start_date' => '2020-05-25 00:00:00',
                'end_date' => '2020-05-25 00:00:00',
                'description' => 'What is Lorem Ipsum?. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'active' => '1',
                'avatar' => 'cooked.jpg',
                'licensor_id' => '1',
                'product_id' => '2',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '10',
                'title' => 'annual general meeting',
                'venue_id' => '1',
                'service_id' => '1',
                'start_date' => '2020-05-25 00:00:00',
                'end_date' => '2020-05-25 00:00:00',
                'description' => 'What is Lorem Ipsum?. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'active' => '1',
                'avatar' => 'beaf.jpg',
                'licensor_id' => '1',
                'product_id' => '4',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'PNP Tableview',
                'venue_id' => '1',
                'service_id' => '3',
                'start_date' => '2020-05-25 00:00:00',
                'end_date' => '2020-05-25 00:00:00',
                'description' => 'What is Lorem Ipsum?. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'active' => '1',
                'avatar' => 'barbecue.jpg',
                'licensor_id' => '1',
                'product_id' => '4',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}