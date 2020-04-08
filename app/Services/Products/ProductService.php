<?php
namespace App\Services\Products;

use App\Http\Requests\Admin\Products\CreateRequest;
use App\Models\Product;

class ProductService
{
    public function create(CreateRequest $request)
    {
        return Product::new(
            $request['name'],
            $request['description'],
            $request['cost'],
            $request['slug']
        );
    }
}
