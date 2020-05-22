<?php
namespace app\Services;

use App\Models\TgBotInvite;
use Illuminate\Support\Carbon;

class TgBotInviteService
{
    /**
     * @param int $orderId
     * @param string $status
     * @param Carbon|null $activatedAt
     * @return TgBotInvite
     */
    public function create(int $orderId, string $status = TgBotInvite::STATUS_NOT_ACTIVATED, Carbon $activatedAt = null): TgBotInvite
    {
        return TgBotInvite::new($orderId, $status, $activatedAt);
    }
}
