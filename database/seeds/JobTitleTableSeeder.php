<?php

use App\Model\Employees\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $titles = [
            array(
                'id' => '1',
                'title' => 'Chef',
                'active' => '1',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'Waitress',
                'active' => '1',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'Administrator',
                'active' => '1',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];

        foreach ($titles as $titles) {
            JobTitle::create($titles);
        }

    }
}