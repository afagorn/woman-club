<?php

namespace App\Models;

use App\Models\Product\Product;
use App\Models\User\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property array $products_id Json cast
 * @property string $type
 * @property int $cost
 * @property string $hash
 * @property string $promocode_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Customer $customer
 * @property Product[] $products
 * @property Promocode $promocode
 * @method static Builder|\App\Models\Order newModelQuery()
 * @method static Builder|\App\Models\Order newQuery()
 * @method static Builder|\App\Models\Order query()
 * @method static Builder|\App\Models\Order whereCreatedAt($value)
 * @method static Builder|\App\Models\Order whereId($value)
 * @method static Builder|\App\Models\Order whereProductId($value)
 * @method static Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\TgBotInvite $tgInviteLink
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProductsId($value)
 */
class Order extends Model
{
    const STATUS_PAID = 'paid';
    const STATUS_NOT_PAID = 'not_paid';

    const TYPE_SUB_NEW = 'sub_new';
    const TYPE_SUB_RENEWAL = 'sub_renewal';

    protected $fillable = ['customer_id', 'type', 'cost', 'promocode_id', 'status', 'products_id', 'hash'];

    protected $casts = ['products_id' => 'array'];

    public static function new(int $customerId, array $productsId, string $type, int $cost, string $status, int $promocodeId): self
    {
        return static::create([
            'customer_id' => $customerId,
            'products_id' => $productsId,
            'type' => $type,
            'cost' => $cost,
            'promocode_id' => $promocodeId,
            'hash' => Str::random(32),
            'status' => $status
        ]);
    }

    public function doStatusPaid()
    {
        $this->update(['status' => self::STATUS_PAID]);
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

    public static function isEqualCost(int $orderId, int $cost)
    {
        $order = Order::findOrFail($orderId);
        return $order->cost === $cost;
    }

    public function getSumProducts()
    {
        $sum = 0;
        foreach ($this->products as $product)
            $sum += $product->cost;
        return $sum;
    }

    public function promocodeToText()
    {
        return !is_null($this->promocode) ? $this->promocode->name . ' (' . $this->promocode->discount . '%)' : '---';
    }

    public function productsToText()
    {
        $str = '';
        foreach($this->products as $product)
             $str .= $product->name . ' (' . $product->cost . '); ';
        return substr($str, 0, -2);
    }

    /********** relations ***********/

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getProductsAttribute()
    {
        return Product::findMany($this->products_id);
    }

    public function promocode()
    {
        return $this->belongsTo(Promocode::class, 'promocode_id');
    }
}
