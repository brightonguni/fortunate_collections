<?php

use Illuminate\Database\Seeder;
use App\Model\Pages\ProjectPage;
class ProjectPageTableSeeder extends Seeder
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
                'title' => 'Projects',
                'description' => 'a project is a series of tasks that need to be completed in order to reach a specific outcome. A project can also be defined as a set of inputs and outputs required to achieve a particular goal. Projects can range from simple to complex and can be managed by one person or a hundred.',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            ProjectPage::create($team);
        }
    }
}