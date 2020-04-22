<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    return [
        'status' => \App\Models\Order::STATUS_PAID
    ];
});
