<?php
namespace App\Console\Commands;

use DialogueTelegramBotSDK\DialogueBot;
use DialogueTelegramBotSDK\DTO\ProxyDTO;
use DialogueTelegramBotSDK\TelegramAPI;
use DialogueTelegramBotSDK\UpdatesHandler;
use Illuminate\Console\Command;
use SebastianBergmann\Environment\Console;
use unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;

class SubnailBot extends Command
{
    const BOT_TOKEN = '1248330469:AAG-NNYbXLEuQaXCp2TufeiRy66Z30nukl0';

    protected $signature = 'subnailBot:start';
    protected $description = 'SubnailBot description';

    public function handle()
    {
        $getUpdates = new GetUpdates();
        $getUpdates->timeout = 10;
        //$getUpdates->offset = 867355924;

        $telegramAPI = new TelegramAPI(
            self::BOT_TOKEN,
            (env('APP_ENV') == 'local' ? new ProxyDTO(
                '94.177.239.9',
                '7080',
                'sockd',
                'sockdpasswd'
            ) : null)
        );

        /*$dialogueBot = new DialogueBot($telegramAPI, $getUpdates);
        $dialogueBot->startLoop();*/
        $dialogueBot = new DialogueBot(new UpdatesHandler($telegramAPI, $getUpdates));
        $dialogueBot->start();
    }
}
