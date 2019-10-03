<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Fansubber;
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

$factory->define(Fansubber::class, function (Faker $faker) {
    return [

        'user_id' => $faker->unique()->numberBetween(1, 10),
        'fansub_id' => random_int(1, 10),
        'role' => random_int(0, 5)
    ];
});
