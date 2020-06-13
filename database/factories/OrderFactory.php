<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    return [
        'type' => \App\Models\Order::TYPE_SUB_NEW,
        'hash' => \Illuminate\Support\Str::random(32),
        'status' => \App\Models\Order::STATUS_PAID
    ];
});
