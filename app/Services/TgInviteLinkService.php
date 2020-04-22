<?php
namespace app\Services;

use App\Models\TgInviteLink;
use App\Services\User\CustomerService;

class TgInviteLinkService
{
    /**
     * Создаем ссылку
     * @param int $productId
     * @return TgInviteLink
     */
    public function create(int $productId): TgInviteLink
    {
        return TgInviteLink::new($productId);
    }


}
