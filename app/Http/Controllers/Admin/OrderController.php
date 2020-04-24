<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\CreateRequest;
use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $orders = Order::with(['customer.user', 'tgInviteLink'])->get();

        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all(['id','slug', 'name']);

        return view('admin.order.create', compact('products'));
    }

    public function store(CreateRequest $request)
    {
        $order = $this->service->checkout(
            $request['productId'],
            new CustomerDTO(
                new UserDTO(
                    $request['email'],
                    $request['name']
                )
            ),
            $request['status']
        );

        if (!$order)
            flash('Произошла ошибка при создании заказа :( Пните разработчика, чтобы он все починил')->error();
        else
            flash('Заказ успешно создан')->success();

        return redirect(route('admin.order.show', $order->id));
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
