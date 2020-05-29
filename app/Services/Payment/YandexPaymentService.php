<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Services\OrderService;
use App\Services\User\CustomerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
     * @param array $dataRequest
     */
    public function handleSuccessPayment(array $dataRequest)
    {
        $this->checkHash($dataRequest['sha1_hash']);
        $dataLabel = json_decode($dataRequest['label']);// {"orderId":1}

        if(!isset($dataLabel->orderId) || !is_numeric($dataLabel->orderId))
            throw new \InvalidArgumentException('Wrong order id');

        if(!Order::isEqualCost($dataLabel->orderId, (int) $dataRequest['amount']))
            throw new \RuntimeException('Invalid order amount');

        $this->orderService->handlePaidOrder($dataLabel->orderId);
    }

    /**
     * @param string $hash
     */
    private function checkHash(string $hash)
    {
        //TODO Реализовать проверку хеша!
    }
}
