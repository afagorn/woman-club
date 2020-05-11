<?php
namespace SubnailBot;

use DialogueTelegramBotSDK\DialogueBot;
use DialogueTelegramBotSDK\TelegramAPI;
use DialogueTelegramBotSDK\UpdatesHandler;
use unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;

class SubnailBot
{
    public function start()
    {
        $getUpdates = new GetUpdates();
        $getUpdates->timeout = 10;

        $telegramAPI = new TelegramAPI();
        if(env('APP_ENV') == 'local') {
            $telegramAPI->setProxy(
                '94.177.239.9',
                '7080',
                'sockdpasswd',
                'sockd'
            );
        }

        /*$dialogueBot = new DialogueBot($telegramAPI, $getUpdates);
        $dialogueBot->startLoop();*/
        $dialogueBot = new DialogueBot(new UpdatesHandler($telegramAPI, $getUpdates));
        $dialogueBot->start();
    }
}
