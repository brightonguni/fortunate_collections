<?php

use App\Model\AboutUs\AboutUsPage;
use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutusPage = [
            array(
                'id' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'active' => '1',
                'avatar' =>'roofed-stares.jpeg',
                'title' => 'Mywendyhouse, Cape Town',
                'description' => 'Mywendyhouse is a company estabilished in 2019 by a group of skilled people in various construction profiles. We specialize mainly of the construction of Wendy-houses both
                                  on commercial and domestic environment. We are the professional and best option for the manufacturing of very good shelters for both the poor, middle class and the upper class people.
                                  No job is too small or too big for us, for you are the one who put food on our table and pay our dues.',

            ),

        ];

        foreach ($aboutusPage as $about) {
            AboutUsPage::create($about);
        }
    }
}