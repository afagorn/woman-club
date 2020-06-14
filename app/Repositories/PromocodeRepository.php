<?php

namespace App\Repositories;

use App\Models\Promocode;
use App\Repositories\Interfaces\IPromocodeRepository;
use Carbon\Carbon;

class PromocodeRepository implements IPromocodeRepository
{
    public function getValidByName(string $name)
    {
        $name = strtolower(trim($name));
        return Promocode::where('name', '=', $name)
            ->where('status', '=', Promocode::STATUS_ACTIVATED)
            ->where('expiration_at', '>', Carbon::now())
            ->first();
    }

    public function findValidAll()
    {
        return Promocode::where('status', '=', Promocode::STATUS_ACTIVATED)
            ->where('expiration_at', '>', Carbon::now())
            ->get();
    }
}
