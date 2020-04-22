<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $unsubscribeDate = new \Illuminate\Support\Carbon();
    $unsubscribeDate->addMonth();
    return [
        'unsubscribe_at' => $unsubscribeDate
    ];
});
