<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocode
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property integer $discount
 * @property Carbon $expiration_at
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promocode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promocode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promocode query()
 * @mixin \Eloquent
 */
class Promocode extends Model
{
    const STATUS_ACTIVATED = 'activated';
    const STATUS_NOT_ACTIVATED = 'not_activated';

    protected $fillable = ['name', 'discount', 'expiration_at', 'status', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at', 'expiration_at'];

    public static function new(string $name, int $discount, Carbon $expirationDate, string $status = self::STATUS_ACTIVATED)
    {
        return static::create([
            'name' => $name,
            'discount' => $discount,
            'expiration_at' => $expirationDate,
            'status' => $status
        ]);
    }

    public function statusToText()
    {
        $text = 'Активен';
        if($this->status == self::STATUS_NOT_ACTIVATED)
            $text = 'Не активен';

        return $text;
    }
}
