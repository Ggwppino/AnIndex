<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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
        'name' => $faker->name(),
        'email' => $faker->sentence(),
        'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'password' => $faker->sentence(),
        'remember_token' => $faker->sentence(),
        'grade_level' => rand(1, 10)
    ];
});
