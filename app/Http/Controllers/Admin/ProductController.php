<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\CreateRequest;
use App\Http\Requests\Admin\Products\EditRequest;
use App\Models\Product\Product;
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
            flash('Продукт успешно создан')->success();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect(route('admin.products.show', $product->slug));
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
            flash('Продукт успешно сохранен')->success();

        return redirect(route('admin.products.show', $product->slug));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, Product $product)
    {
        try {
            $product->delete();
            flash('Продукт успешно удален')->success();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect(route('admin.products.index'));
    }
}
