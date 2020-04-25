<?php
namespace App\Services;

use App\Models\DTO\User\CustomerDTO;
use App\Models\Order;
use App\Models\Product;
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
     * @param CustomerDTO $customerDTO
     * @param string $status
     * @return Order
     */
    public function checkout(int $productId, CustomerDTO $customerDTO, $status = Order::STATUS_NOT_PAID): Order
    {
        $product = Product::find($productId)->first();

        $customer = $this->customerService->create($customerDTO);
        $tgInviteLink = $this->tgInviteLinkService->create($productId);

        if(!is_null($customer->user->email)) {
            // TODO Отправка письма с ссылкой
        }

        return $this->create($customer->id, $tgInviteLink->id, $product->cost,
            $status);
    }

    public function create(int $customerId, int $tgInviteLinkId, int $cost, string $status = Order::STATUS_NOT_PAID): Order
    {
        return Order::new(
            $customerId,
            $tgInviteLinkId,
            $cost,
            $status
        );
    }
}
