<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\CreateAdminRequest;
use App\Models\Order;
use App\Models\Product\Product;
use App\Repositories\Interfaces\IPromocodeRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $service;

    /**
     * @var IPromocodeRepository
     */
    private $promocodeRepository;

    /**
     * OrderController constructor.
     * @param OrderService $service
     * @param IPromocodeRepository $promocodeRepository
     */
    public function __construct(OrderService $service, IPromocodeRepository $promocodeRepository)
    {
        $this->service = $service;
        $this->promocodeRepository = $promocodeRepository;
    }

    public function index()
    {
        $orders = Order::with(['customer.user'])->get();

        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all(['id', 'slug', 'name']);
        $promocodes = $this->promocodeRepository->findValidAll();

        return view('admin.order.create', compact('products', 'promocodes'));
    }

    public function store(CreateAdminRequest $request)
    {
        if (!$order = $this->service->createAdmin($request))
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
