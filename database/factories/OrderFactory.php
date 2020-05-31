<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    $countProducts = rand(1, 2);
    $productsId = [];

    for ($i = 1; $i <= $countProducts; $i++)
        $productsId[] = rand(1, 2);

    return [
        'products_id' => $productsId,
        'cost' => 250 * $countProducts,
        'type' => \App\Models\Order::TYPE_SUB_NEW,
        'hash' => \Illuminate\Support\Str::random(32),
        'status' => \App\Models\Order::STATUS_PAID
    ];
});
