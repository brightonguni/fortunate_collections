<?php

use App\Model\Employees\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Employees = [
            array(
                'id' => '1',
                'user_id' => '1',
                'department_id' => '1',
                'category_id' => '2',
                'contract_id' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'status' => '1',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has",
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

            array(
                'id' => '2',
                'user_id' => '2',
                'department_id' => '2',
                'category_id' => '3',
                'contract_id' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'status' => '1',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has",
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

            array(
                'id' => '3',
                'user_id' => '3',
                'category_id' => '2',
                'department_id' => '3',
                'contract_id' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'status' => '1',
                'description' => "What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has",
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($Employees as $employee) {
            Employee::create($employee);
        }

    }
}