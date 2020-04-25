<?php

namespace App\Models\User;

use App\Models\DTO\User\CustomerDTO;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

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

    public static function new(CustomerDTO $DTO)
    {
        $user = User::new($DTO->userDTO);

        $customer = static::create([
            'user_id' => $user->id,
            'tg_username' => $DTO->tgUsername,
            'unsubscribe_at' => $DTO->unsubscribeDate
        ]);

        $customer->user = $user;

        return $customer;
    }

    public function unsubscribeDateToText()
    {
        if(is_null($this->unsubscribe_at))
            return 'Не указана';

        return $this->unsubscribe_at->toDateTimeString();
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
