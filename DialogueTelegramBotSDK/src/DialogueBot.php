<?php
namespace DialogueTelegramBotSDK;

use unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;

class DialogueBot
{
    /**
     * @var UpdatesHandler
     */
    private $updatesHandler;

    /**
     * @var TelegramAPI
     */
    //private $telegramAPI;

    //public function __construct(TelegramAPI $telegramAPI, UpdatesHandler $updatesHandler)
    public function __construct(UpdatesHandler $updatesHandler)
    {
        //$this->telegramAPI = $telegramAPI;
        //$this->updatesHandler = $updatesHandler ?? new UpdatesHandler($this->telegramAPI);
        $this->updatesHandler = $updatesHandler;
    }

    public function start()
    {
        $this->updatesHandler->startLoop();
    }


}
