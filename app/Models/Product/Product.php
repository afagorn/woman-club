<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Builder;
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
 * @property string $invite_link
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCost($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['slug', 'name', 'description', 'cost', 'invite_link'];

    public function resolveRouteBinding($value, $field = null)
    {
        return Product::where(['slug' => $value])->first();
    }

    /**
     * @param string $name
     * @param string $description
     * @param int $cost
     * @param string $inviteLink
     * @param string|null $slug
     * @return static
     */
    public static function new(string $name, string $description, int $cost, string $inviteLink, string $slug = null): self {
        return static::create([
            'name' => $name,
            'description' => $description,
            'cost' => $cost,
            'invite_link' => $inviteLink,
            'slug' => is_null($slug) ? \Str::slug($name) : $slug
        ]);
    }

    /**
     * @param int $productId
     * @param int $cost
     * @return bool
     */
    public static function isEqualCost(int $productId, int $cost)
    {
        $product = self::findOrFail($productId);
        return $product->cost === $cost;
    }


}
