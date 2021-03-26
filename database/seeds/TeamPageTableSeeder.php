<?php

use App\Model\Pages\TeamPage;
use Illuminate\Database\Seeder;

class TeamPageTableSeeder extends Seeder
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
                'title' => 'Team',
                'description' => 'A team is a group of individuals (human or non-human) working together to achieve their goal. Teams normally have members with complementary skills and generate synergy through a coordinated effort which allows each member to maximize their strengths and minimize their weaknesses.',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            TeamPage::create($team);
        }
    }
}