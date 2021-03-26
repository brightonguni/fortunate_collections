<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('123456'), // password
        'remember_token' => Str::random(10),
        'activation_token' => ' ',
        'phone' => $faker->phoneNumber,
        'status' => Status::where('name', 'active')->where('type', 'user')->first()->name,
    ];

    $customer = Customer::create([
        'first_name' => 'Brighton',
        'last_name' => 'Guni',
        'name' => 'Brighton Guni',
        'email' => 'admin@khonology.com',
        'password' => Hash::make('123456'),
        'activation_token' => ' ',
        'phone' => '0837147626',
        'status' => Status::where('name', 'active')->where('type', 'user')->first()->name,
    ]);

    $user_role = RoleUser::create([
        'user_id' => $customer->id,
        'role_id' => Role::where('name', 'Administrator')->first()->id,
    ]);
});
