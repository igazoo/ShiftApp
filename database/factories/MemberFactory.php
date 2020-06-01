<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'gender' => $faker->randomElement([0 , 1]),
      'type' => $faker->numberBetween($min = 1 , $max = 3),
        //
    ];
});
