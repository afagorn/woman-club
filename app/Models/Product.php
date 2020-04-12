<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App\Models
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property integer $cost
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['slug', 'name', 'description', 'cost'];

    public function resolveRouteBinding($value, $field = null)
    {
        return Product::where(['slug' => $value])->first();
    }

    public static function new(string $name, string $description, int $cost, string $slug = null): self {
        $product = static::create([
            'name' => $name,
            'description' => $description,
            'cost' => $cost,
            'slug' => is_null($slug) ? \Str::slug($name) : $slug
        ]);

        return $product;
    }
}
