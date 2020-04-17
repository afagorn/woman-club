<?php
namespace app\Services;

use App\Models\Order;

class OrderService
{
    private $userService;

    private $tgInviteLinkService;

    public function __construct(TgInviteLinkService $tgInviteLinkService)
    {
        $this->tgInviteLinkService = $tgInviteLinkService;
    }

    public function create(int $customerId, int $tgInviteLinkId, string $status = Order::STATUS_NOT_PAID): Order
    {
        return Order::new(
            $customerId,
            $tgInviteLinkId,
            $status
        );
    }

    public function createWithCustomer(int $tgInviteLinkId, string $status = Order::STATUS_NOT_PAID)
    {
        $user = $this->userService->create();

        return $this->create(
            $user->id,
            $tgInviteLinkId,
            $status
        );
    }
}
