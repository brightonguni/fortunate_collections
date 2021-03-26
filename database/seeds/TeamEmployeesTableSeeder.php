<?php

use App\Model\Employees\EmployeeTeam;
use Illuminate\Database\Seeder;

class TeamEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team_employees = [
            array(
                'id' => '1',
                'team_id' => '1',
                'employee_id' => '1',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'team_id' => '2',
                'employee_id' => '2',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'team_id' => '1',
                'employee_id' => '3',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
                'deleted_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($team_employees as $team) {
            EmployeeTeam::create($team);
        }
    }
}