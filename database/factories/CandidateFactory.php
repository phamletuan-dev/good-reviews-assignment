<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Candidate;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(1, 30),
        'gender' => $faker->numberBetween(1, 2),
        'job_title' => $faker->numberBetween(1, 3),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
