<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\CreateAdminRequest;
use App\Models\Order;
use App\Models\Product\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $service;

    /**
     * OrderController constructor.
     * @param OrderService $service
     */
    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $orders = Order::with(['customer.user'])->get();

        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all(['id', 'slug', 'name']);

        return view('admin.order.create', compact('products'));
    }

    public function store(CreateAdminRequest $request)
    {
        if (!$order = $this->service->create($request))
            flash('Произошла ошибка при создании заказа :( Пните разработчика, чтобы он все починил')->error();
        else
            flash('Заказ успешно создан')->success();

        return redirect(route('admin.order.show', $order->id));
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {

    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
        } catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return back();
        }

        return redirect(route('admin.order.index'));
    }
}
