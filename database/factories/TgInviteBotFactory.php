<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TgBotInvite;
use Faker\Generator as Faker;

$factory->define(TgBotInvite::class, function (Faker $faker) {
    return [
        'hash' => Str::random(32),
        'status' => TgBotInvite::STATUS_NOT_ACTIVATED
    ];
});
