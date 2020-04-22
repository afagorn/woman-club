<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TgInviteLink;
use Faker\Generator as Faker;

$factory->define(TgInviteLink::class, function (Faker $faker) {
    return [
        'product_id' => rand(1, 2),
        'link' => TgInviteLink::createLink(),
        'status' => TgInviteLink::STATUS_NOT_ACTIVATED
    ];
});
