<?php

namespace App\Models\User;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Customer
 * @property int $id
 * @property int $user_id
 * @property string $tg_username
 * @property \Illuminate\Support\Carbon|null $unsubscribe_at
 * @property User $user
 * @property Order[] $orders
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Customer query()
 * @mixin \Eloquent
 */
class Customer extends Model
{
    protected $fillable = ['user_id', 'tg_username'];

    protected $dates = ['unsubscribe_at'];

    public $timestamps = false;

    public static function new(int $userId, string $tgUsername, Carbon $unsubscribeAt = null)
    {
        return static::create([
            'user_id' => $userId,
            'tg_username' => $tgUsername,
            'unsubscribe_at' => $unsubscribeAt
        ]);
    }

    public static function createBlank(int $userId)
    {
        return static::create([
            'user_id' => $userId,
            'tg_username' => null,
            'unsubscribe_at' => null
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
