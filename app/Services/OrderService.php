<?php
namespace App\Services;

use App\Models\Order;
use App\Services\User\CustomerService;

class OrderService
{
    private $customerService;

    private $tgInviteLinkService;

    public function __construct(TgInviteLinkService $tgInviteLinkService, CustomerService $customerService)
    {
        $this->tgInviteLinkService = $tgInviteLinkService;
        $this->customerService = $customerService;
    }

    /**
     * Оформление заказа
     * Создание Order с Customer, InviteLink и отправка письма
     * @param int $productId
     * @param string $email
     * @param string $status
     * @return Order
     */
    public function checkout(int $productId, string $email = null, $status = Order::STATUS_NOT_PAID): Order
    {
        $customer = $this->customerService->createBlank($email);
        $tgInviteLink = $this->tgInviteLinkService->create($productId);

        if(!is_null($email)) {
            // TODO Отправка письма с ссылкой
        }

        return $this->create($customer->id, $tgInviteLink->id, $status);
    }

    public function create(int $customerId, int $tgInviteLinkId, string $status = Order::STATUS_NOT_PAID): Order
    {
        return Order::new(
            $customerId,
            $tgInviteLinkId,
            $status
        );
    }
}
