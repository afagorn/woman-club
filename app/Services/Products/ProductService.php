<?php
namespace App\Services\Products;

use App\Http\Requests\Admin\Products\CreateRequest;
use App\Http\Requests\Admin\Products\EditRequest;
use App\Models\Product\Product;

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

    public function edit(Product $product, EditRequest $request)
    {
        return $product->update($request->validated());
    }
}
