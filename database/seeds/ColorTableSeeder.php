<?php

use App\Model\Products\Color;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $colors = [
            array(
                'id' => '1',
                'name' => "black",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'name' => "red",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'name' => "blue",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '4',
                'name' => "green",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '5',
                'name' => "orange",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '6',
                'name' => "yellow",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '7',
                'name' => "pink",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '8',
                'name' => "brown",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '9',
                'name' => "white",
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];

        foreach ($colors as $color) {
            Color::create($color);
        }

    }
}