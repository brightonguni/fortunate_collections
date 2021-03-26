<?php

use App\Model\Licensors\Licensor;
use Illuminate\Database\Seeder;

class LicensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $licensors = [
            array(

                'name' => 'Guni Digital Cape Town',
                'logo' => '',
                'splash_screen' => '',
                'active' => '1',
            ),
            array(
                'name' => 'Guni It Solutions',
                'logo' => '',
                'splash_screen' => '',
                //'vehicle_id' => '2',
                'active' => '1',
            ),

        ];
        foreach ($licensors as $licensor) {
            Licensor::create($licensor);
        }
    }

}