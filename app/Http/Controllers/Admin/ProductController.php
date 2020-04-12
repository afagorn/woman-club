<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\CreateRequest;
use App\Http\Requests\Admin\Products\EditRequest;
use App\Models\Product;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(CreateRequest $request)
    {
        try {
            $product = $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        //return redirect(route('admin.product.show', $product));
        return redirect(route('admin.products.index'));
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(EditRequest $request, Product $product)
    {
        if($this->service->edit($product, $request))
            $request->session()->flash('status', 'Продукт успешно сохранен');

        return redirect(route('admin.products.show', $product->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
