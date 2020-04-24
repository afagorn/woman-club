<?php

namespace App\Services\Payment;

use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Models\Order;
use App\Models\Product;
use app\Services\OrderService;
use Illuminate\Http\Request;

class YandexPaymentService
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Обрабатываем успешный платеж
     * @param Request $request
     * @return bool
     */
    public function handleSuccessPayment(Request $request): bool
    {
        $this->checkHash($request['hash']);
        $data = json_decode($request['label']);// {'productId':1}

        if(!Product::isEqualCost($data->productId, $request['amount']))
            return false;

        $this->orderService->checkout(
            $data->productId,
            new CustomerDTO(new UserDTO($request['email'])),
            Order::STATUS_PAID
        );

        return true;
    }

    private function checkHash($hash)
    {
        //TODO Реализовать проверку хеша!
    }
}
