<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Services\OrderService;
use App\Services\User\CustomerService;

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
        /*if(!$this->checkHash($dataRequest))
            throw new \InvalidArgumentException('Wrong hash');*/

        $dataLabel = json_decode($dataRequest['label']);// {"orderId":1}

        if(!isset($dataLabel->orderId) || !is_numeric($dataLabel->orderId))
            throw new \InvalidArgumentException('Wrong order id');

        if(!Order::isEqualCost($dataLabel->orderId, (int) $dataRequest['withdraw_amount']))
            throw new \RuntimeException('Invalid order amount');

        $this->orderService->handlePaidOrder($dataLabel->orderId);
    }

    /**
     * @param array $requestData
     * @return bool
     */
    private function checkHash(array $requestData)
    {
        $currentHash = bin2hex(sha1($requestData['notification_type'] . '&'
            . $requestData['operation_id'] . '&'
            . $requestData['amount'] . '&'
            . $requestData['currency'] . '&'
            . $requestData['datetime'] . '&'
            . $requestData['sender'] . '&'
            . $requestData['codepro'] . '&'
            . env('YANDEX_MONEY_SECRET')
            . $requestData['label']));

        return $currentHash == $requestData['sha1_hash'];
    }
}
