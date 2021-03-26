<?php

use App\Model\Bookings\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venues = [
            array(
                'id' => '1',
                'title' => 'the wedding paradise',
                'street' => '16 cross road',
                'suburb' => 'tableview',
                'city' => 'cape town',
                'state' => 'western cape',
                'country' => 'south Africa',
                'postal_code' => '7441',
            ),
            array(
                'id' => '2',
                'title' => 'Pic n Pay',
                'street' => 'soothridge road',
                'suburb' => 'tableview',
                'city' => 'cape town',
                'state' => 'western cape',
                'country' => 'south Africa',
                'postal_code' => '7441',
            ),
        ];
        foreach ($venues as $venue) {
            Venue::create($venue);
        }
    }
}