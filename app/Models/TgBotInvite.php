<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Модель для создания инвайт ссылок с хешем для бота
 *
 * @property int $id
 * @property string $hash
 * @property int $order_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $activated_at|null
 * @property Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite query()
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $activated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereActivatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TgBotInvite whereStatus($value)
 */
class TgBotInvite extends Model
{
    const STATUS_ACTIVATED = 'active';
    const STATUS_NOT_ACTIVATED = 'not activated';

    const UPDATED_AT = null;
    protected $dates = ['activated_at', 'created_at'];

    protected $fillable = ['product_id', 'link', 'status', 'activated_at'];

    public static function new(int $orderId, string $status = self::STATUS_NOT_ACTIVATED, Carbon $activatedAt = null)
    {
        return static::create([
            'hash' => \Str::random(),
            'order_id' => $orderId,
            'status' => $status,
            'activated_at' => $activatedAt
        ]);
    }

    public function doActive()
    {
        $this->update([
            'status' => self::STATUS_ACTIVATED,
            'activated_at' => Carbon::now()
        ]);
    }

    public function getInviteLink(): string
    {
        $telegramBotLink = \Config::get('telegramBot.link');
        if(!preg_match('/\/$/', $telegramBotLink))
            $telegramBotLink = $telegramBotLink . '/';

        return $telegramBotLink . '?start=' . $this->hash;
    }

    public function order()
    {
        //return $this->hasOne(Order::class, 'order_id');
        return $this->belongsTo(Order::class, 'order_id');
    }
}
