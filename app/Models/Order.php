<?php

namespace App\Models;

use App\Models\User\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $tg_invite_link_id
 * @property int $cost
 * @property string $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property Customer $customer
 * @property TgInviteLink $tgInviteLink
 * @method static Builder|\App\Models\Order newModelQuery()
 * @method static Builder|\App\Models\Order newQuery()
 * @method static Builder|\App\Models\Order query()
 * @method static Builder|\App\Models\Order whereCreatedAt($value)
 * @method static Builder|\App\Models\Order whereId($value)
 * @method static Builder|\App\Models\Order whereProductId($value)
 * @method static Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    const STATUS_PAID = 'paid';
    const STATUS_NOT_PAID = 'not paid';

    protected $fillable = ['customer_id', 'tg_invite_link_id', 'cost', 'status'];

    public static function new(int $customerId, string $tgInviteLinkId, int $cost, string $status): self
    {
        return static::create([
            'customer_id' => $customerId,
            'tg_invite_link_id' => $tgInviteLinkId,
            'cost' => $cost,
            'status' => $status
        ]);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function tgInviteLink()
    {
        return $this->belongsTo(TgInviteLink::class, 'tg_invite_link_id', 'id');
    }

    public function statusToText()
    {
        $text = '';
        if($this->status == self::STATUS_PAID)
            $text = 'Оплачен';
        elseif($this->status == self::STATUS_NOT_PAID)
            $text = 'Не оплачен';

        return $text;
    }
}
