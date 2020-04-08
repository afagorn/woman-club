<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property integer $cost
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['slug', 'name', 'description', 'cost'];

    public static function new(string $name, string $description, int $cost, string $slug = null): self {
        //dd([$slug, $name, is_null($slug) || empty($slug) ? \Str::slug($name) : $slug]);

        $product = static::create([
            'name' => $name,
            'description' => $description,
            'cost' => $cost,
            'slug' => is_null($slug) ? \Str::slug($name) : $slug
        ]);

        return $product;
    }
}
