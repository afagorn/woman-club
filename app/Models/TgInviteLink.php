<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TgInviteLink
 * @property int $id
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

    const UPDATED_AT = null;
    protected $dates = ['activated_at', 'created_at'];

    protected $fillable = ['product_id', 'link', 'status', 'activated_at'];

    public static function new(int $productId, string $status = self::STATUS_NOT_ACTIVATED, Carbon $activatedAt = null)
    {
        return static::create([
            'product_id' => $productId,
            'link' => self::createLink(),
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

    public static function createLink(): string
    {
        $hash = \Str::random(32);
        $telegramBotLink = \Config::get('telegramBot.link');
        if(!preg_match('/\/$/', $telegramBotLink))
            $telegramBotLink = $telegramBotLink . '/';

        return $telegramBotLink . '?start=' . $hash;
    }

    /*public function order()
    {
        return $this->belongsTo(Order::class, 'tg_invite_link_id');
    }*/

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
