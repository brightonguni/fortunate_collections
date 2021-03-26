<?php

use App\Model\Permissions\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Adminstrator , Developer / Support / Customer
        $roles = ['Administrator', 'Customer', 'Licensor', 'Store'];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}