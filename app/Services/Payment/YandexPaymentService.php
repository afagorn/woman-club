<?php

namespace App\Services\Payment;

use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Models\Order;
use App\Models\Product\Product;
use app\Services\OrderService;
use App\Services\User\CustomerService;
use Illuminate\Http\Request;

class YandexPaymentService
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * YandexPaymentService constructor.
     * @param OrderService $orderService
     * @param CustomerService $customerService
     */
    public function __construct(OrderService $orderService, CustomerService $customerService)
    {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    /**
     * Обрабатываем успешный платеж
     * Проверяем сумму заказа и устанавливаем статус Оплачено
     * @param Request $request
     * @return bool
     */
    public function handleSuccessPayment(Request $request): bool
    {
        $this->checkHash($request['hash']);
        $data = json_decode($request['label']);// {'orderId':1}

        if(!Order::isEqualCost($data->orderId, (int) $request['amount']))
            return false;

        $this->orderService->handlePaidOrder($data->orderId);

        return true;
    }

    /**
     * @param string $hash
     */
    private function checkHash(string $hash)
    {
        //TODO Реализовать проверку хеша!
    }
}
