<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Promocode::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'discount' => rand(5, 15),
        'expiration_at' => \Illuminate\Support\Carbon::now()->addMonth(),
        'status' => \App\Models\Promocode::STATUS_ACTIVATED
    ];
});
