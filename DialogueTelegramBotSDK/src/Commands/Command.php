<?php
namespace DialogueTelegramBotSDK\Commands;

use DialogueTelegramBotSDK\TelegramAPI;
use unreal4u\TelegramAPI\Telegram\Types\Update;

abstract class Command implements ICommand
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var TelegramAPI
     */
    protected $telegramAPI;

    /**
     * @var Update
     */
    protected $update;

    /**
     * @param TelegramAPI $telegramAPI
     * @param Update $update
     * @param string $param
     */
    public function init(TelegramAPI $telegramAPI, Update $update, $param = '')
    {
        $this->telegramAPI = $telegramAPI;
        $this->update = $update;
        $this->handle($param);
    }
}
