<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        //define values with faker
        'title' => $faker->title,
        'caption' => $faker->text,
        'copyright' => $faker->text,
        'email' => $faker->unique()->companyEmail,
        'owner_id' => rand(1, \App\Owner::count())
    ];
});
