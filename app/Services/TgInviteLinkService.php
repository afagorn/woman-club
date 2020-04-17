<?php
namespace app\Services;

use App\Models\TgInviteLink;
use App\Services\User\CustomerService;

class TgInviteLinkService
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Создаем ссылку и если нужно то отправляем на email и создаем "пустого" Customer
     *
     * @param int $productId
     * @param string|null $email
     * @return TgInviteLink
     */
    public function create(int $productId, string $email = null): TgInviteLink
    {
        $link = TgInviteLink::new(
            $productId,
            $this->createLink()
        );

        if(!is_null($email)) {
            //TODO Отправить письмо с ссылкой!

            $this->customerService->registerBlank($email);
        }

        return $link;
    }

    private function createLink(): string
    {
        $hash = \Str::random(32);
        $telegramBotLink = \Config::get('telegramBot.link');
        if(!preg_match('/\/$/', $telegramBotLink))
            $telegramBotLink = $telegramBotLink . '/';

        return $telegramBotLink . '?start=' . $hash;
    }
}
