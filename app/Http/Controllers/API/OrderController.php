<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Services\OrderService;
use App\Services\User\CustomerService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    private $customerService;

    public function __construct(OrderService $orderService, CustomerService $customerService)
    {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'email' => 'string|max:120|email|required',
            'productsId' => 'string|required'
        ]);

        $order = $this->orderService->create(
            $this->customerService->create(new CustomerDTO(new UserDTO($data['email']))),
            json_decode($data['productsId'], true)
        );

        return \Response::json(['id' => $order->id, 'cost' => $order->cost]);
    }
}
