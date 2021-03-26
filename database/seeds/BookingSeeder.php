<?php

use App\Model\Bookings\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = [
            array(
                'id' => '1',
                'user_id' => '3',
                'event_id' => '1',
                'venue_id' => '2',
                'service_id' => '1',
                'category_id' => '1',
                'start_date' => '2020-02-25 00:00:00',
                'end_date' => '2020-02-25 00:00:00',
                'licensor_id' => '1',
                'store_id' => '1',
                'active' => '1',
                'description' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}