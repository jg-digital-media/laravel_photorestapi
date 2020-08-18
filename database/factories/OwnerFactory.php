<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        //define values with faker
        'name' => $faker->text,
        'copyright' => $faker->text
    ];
});
