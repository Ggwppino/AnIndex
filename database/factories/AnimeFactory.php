<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Anime;
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

$factory->define(Anime::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'status' => random_int(0, 3),
        'sequel' => random_int(-1, 3),
        'father' => null,
        'plot' => $faker->realText(),
        'img' => $faker->sentence()
    ];
});
