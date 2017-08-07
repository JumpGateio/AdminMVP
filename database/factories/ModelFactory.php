<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt(\Illuminate\Support\Str::random(10)),
        'status_id'      => rand(1, 3),
        'remember_token' => str_random(10),
    ];
});

$factory->define(JumpGate\Users\Models\User\Detail::class, function (Faker\Generator $faker) {
    return [
        'first_name'   => $faker->firstName,
        'middle_name'  => $faker->firstName,
        'last_name'    => $faker->lastName,
        'display_name' => $faker->userName,
    ];
});
