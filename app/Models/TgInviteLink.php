<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TgInviteLink
 *
 * @property int $product_id
 * @property string $link
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $activated_at|null
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgInviteLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgInviteLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgInviteLink query()
 * @mixin \Eloquent
 */
class TgInviteLink extends Model
{
    const STATUS_ACTIVATED = 'active';
    const STATUS_NOT_ACTIVATED = 'not activated';

    protected $dates = [
        'activated_at'
    ];

    public static function new(int $productId, string $link, string $status = self::STATUS_NOT_ACTIVATED, Carbon $activatedAt = null)
    {
        return static::create([
            'product_id' => $productId,
            'link' => $link,
            'status' => $status,
            'activated_at' => $activatedAt
        ]);
    }

    public function doActivate()
    {
        $this->update([
            'status' => self::STATUS_ACTIVATED,
            'activated_at' => Carbon::now()
        ]);
    }
}
