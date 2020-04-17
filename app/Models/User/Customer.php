<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Customer
 * @property int $user_id
 * @property string $tg_username
 * @property \Illuminate\Support\Carbon|null $unsubscribe_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer query()
 * @mixin \Eloquent
 */
class Customer extends Model
{
    protected $dates = [
        'unsubscribe_at'
    ];

    public static function new(int $userId, string $tgUsername, Carbon $unsubscribeAt = null)
    {
        return static::create([
            'user_id' => $userId,
            'tg_username' => $tgUsername,
            'unsubscribe_at' => $unsubscribeAt
        ]);
    }

    public static function registerBlank(int $userId)
    {
        return static::create([
            'user_id' => $userId,
            'tg_username' => null,
            'unsubscribe_at' => null
        ]);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
