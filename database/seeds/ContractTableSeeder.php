<?php

use App\Model\Employees\Contract;
use Illuminate\Database\Seeder;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $contracts = [
            array(
                'id' => '1',
                'name' => 'Trainee',
                'active' => '1',
                'duration' => '2',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'name' => 'Temporary',
                'active' => '1',
                'duration' => '2',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'name' => 'Permanent',
                'active' => '1',
                'duration' => '2',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '4',
                'name' => 'Contract',
                'active' => '1',
                'duration' => '2',
                'description' => '',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];

        foreach ($contracts as $contract) {
            Contract::create($contract);
        }

    }
}