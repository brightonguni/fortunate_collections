<?php

use App\Model\Employees\EmployeesCategory;
use Illuminate\Database\Seeder;

class EmployeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeCategories = [
            array(
                'id' => '1',
                'active' => '1',
                'title' => 'Team',
                'avatar' => '',
                'description' => 'teathis is our team support',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'Director',
                'active' => '1',
                'avatar' => '',
                'description' => 'this is our directorate brief summary
                                  ',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'Chef',
                'active' => '1',
                'avatar' => 'chef',
                'description' => 'this is chef description',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '4',
                'title' => 'Waitress',
                'active' => '1',
                'avatar' => '',
                'description' => 'waitress',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($employeeCategories as $category) {
            EmployeesCategory::create($category);
        }
    }
}