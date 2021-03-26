<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = [
            array(
                'name' => 'Brighton Guni',
                'first_name' => 'Brighton',
                'last_name' => 'Guni',
                'phone' => '0837147627',
                'email' => 'admin@gunidigital.co.za',
                'avatar' => 'profile.jpg',
                'activation_token' => ' ',
                'email_verified_at' => null,
                'password' => '$2y$10$RdaCyGLe3iVcstf8EY6POOiYGmtsIV1rFzo7Kv2WUekT90F5GXa8.',
                'active' => '1',
                'role_id' => 1,
                'remember_token' => null,
                'created_at' => '2019-09-12 08:55:41',
                'updated_at' => '2019-09-12 08:55:41',
                'deleted_at' => null,
            ),
            array(
                'name' => 'Dilshan Guni',
                'first_name' => 'Precious',
                'last_name' => 'Mukuwiri',
                'phone' => '0210983456',
                'email' => 'dilshan@gunidigital.co.za',
                'avatar' => 'profile_2.jpg',
                'activation_token' => ' ',
                'email_verified_at' => null,
                'password' => '$2y$10$RdaCyGLe3iVcstf8EY6POOiYGmtsIV1rFzo7Kv2WUekT90F5GXa8.',
                'active' => '1',
                'role_id' => 1,
                'remember_token' => null,
                'created_at' => '2019-11-12 08:55:41',
                'updated_at' => '2019-11-12 08:55:41',
                'deleted_at' => null,
            ),
            array(
                'name' => 'Oneil Guni',
                'first_name' => 'Oneil',
                'last_name' => 'Guni',
                'phone' => '0837147600',
                'avatar' => 'profile_1.jpg',
                'email' => 'oneil@gunidigital.co.za',
                'activation_token' => ' ',
                'email_verified_at' => null,
                'password' => '$2y$10$RdaCyGLe3iVcstf8EY6POOiYGmtsIV1rFzo7Kv2WUekT90F5GXa8.',
                'active' => '1',
                'role_id' => 1,
                'remember_token' => null,
                'created_at' => '2019-11-12 08:55:41',
                'updated_at' => '2019-11-12 08:55:41',
                'deleted_at' => null,
            ),
            array(
                'name' => 'Cecil Cole Guni',
                'first_name' => 'Cecil Cole',
                'last_name' => 'Guni',
                'phone' => '0837147600',
                'avatar' => 'profile_1.jpg',
                'email' => 'cecil.cole@gunidigital.co.za',
                'activation_token' => ' ',
                'email_verified_at' => null,
                'password' => '$2y$10$RdaCyGLe3iVcstf8EY6POOiYGmtsIV1rFzo7Kv2WUekT90F5GXa8.',
                'active' => '1',
                'role_id' => 1,
                'remember_token' => null,
                'created_at' => '2019-11-12 08:55:41',
                'updated_at' => '2019-11-12 08:55:41',
                'deleted_at' => null,
            ),

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}