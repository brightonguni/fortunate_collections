<?php

use App\Model\Employees\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            array(
                'id' => '1',
                'title' => 'Waitrons',
                'description' => 'team description here',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'management',
                'description' => 'team description here',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'Chefs',
                'description' => 'team description here',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}