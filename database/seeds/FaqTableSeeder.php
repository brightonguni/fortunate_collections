<?php

use App\Model\FAQ\Faqs;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faqs = [
            array(
                'id' => '1',
                'question' => 'What do cleaning services include?',
                'answer' => 'Residential cleaning services include the following basic duties:
                              Dusting.
                              Mopping floors.
                              Vacuuming.
                              Fixtures.
                              Washing surfaces.
                              Polishing mirrors etc.',
                'active' => '1',
                'category_id' => '3',
                'licensor_id' => '1',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'question' => 'What does a hotel cleaner do?',
                'answer' => 'Housekeeping cleaners do light cleaning tasks in homes and commercial establishments, such as hotels, restaurants, hospitals, and nursing homes. Those who work in hotels, hospitals, and other commercial establishments are responsible for cleaning and maintaining the premises. They may also share other duties.',
                'active' => '1',
                'category_id' => '3',
                'licensor_id' => '1',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
             array(
                'id' => '3',
                'question' => 'What can a Nomi cleaner do in 2 hours?',
                'answer' => 'What can be accomplished in 2 hours?
                            Vacuuming the entire house.
                            Cleaning the bathrooms, including toilets.
                            Cleaning the kitchen, including quickly mopping the floor.
                            A few assorted small tasks like wiping surfaces down.',
                'active' => '1',
                'category_id' => '3',
                'licensor_id' => '1',
                'store_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),



        ];
        foreach ($Faqs as $faq) {
            Faqs::create($faq);
        }

    }
}