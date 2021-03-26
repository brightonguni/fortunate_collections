<?php

use App\Model\Employees\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            array(
                'id' => '1',
                'name' => 'Event Management',
                'description' => 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?',
                'icon' => '',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',

            ),
            array(
                'id' => '2',
                'name' => 'Sales and Marketing',
                'description' => 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?',
                'icon' => '',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',
            ),

            array(
                'id' => '3',
                'name' => 'Customer Relationship',
                'description' => 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?',
                'icon' => '',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',
            ),
            array(
                'id' => '4',
                'name' => 'Support',
                'description' => 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?',
                'icon' => '',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',
            ),

        ];
        foreach ($departments as $department) {
            Department::create($department);
        }

    }
}