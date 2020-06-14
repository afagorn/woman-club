<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Order\CreateRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(CreateRequest $request)
    {
        $order = $this->orderService->create($request);

        return \Response::json(['id' => $order->id, 'cost' => $order->cost, 'hash' => $order->hash]);
    }
}
