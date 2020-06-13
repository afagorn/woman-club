<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

/**
 * Пока не используется. Не знаю как лучше сделать разные типы продуктов
 *
 * @property int $id
 * @property int $product_id
 * @property string $invite_link
 * @package App\Models\Product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel query()
 * @mixin \Eloquent
 * @property-read \App\Models\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel whereInviteLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product\ProductTelegramChannel whereProductId($value)
 */
class ProductTelegramChannel extends Model
{
    public static function new(string $inviteLink)
    {
        return static::create([
            'invite_link' => $inviteLink
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
