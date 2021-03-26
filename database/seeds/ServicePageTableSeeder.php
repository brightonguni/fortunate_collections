<?php

use App\Model\Pages\ServicePage;
use Illuminate\Database\Seeder;

class ServicePageTableSeeder extends Seeder
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
                'title' => "One stop Online store",
                'description' => "You deserve the best, you are the best, and the best opportunity to turn your wardrop into a marvelous an glamorous unit",
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            ServicePage::create($team);
        }
    }
}