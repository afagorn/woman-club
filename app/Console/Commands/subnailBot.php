<?php
namespace App\Console\Commands;

use afagorn\DialogueTelegramBot\DialogueBot;
use afagorn\DialogueTelegramBot\DTO\ProxyDTO;
use afagorn\DialogueTelegramBot\TelegramAPI;
use App\Console\Commands\SubnailBot\Commands\StartCommand;
use Illuminate\Console\Command;

class SubnailBot extends Command
{
    protected $signature = 'subnailBot:start';
    protected $description = 'SubnailBot description';

    public function handle()
    {
        $dialogueBot = new DialogueBot(new TelegramAPI(
            env('TELEGRAM_BOT_TOKEN'),
            (env('APP_ENV') == 'local' ? new ProxyDTO(
                env('PROXY_SOCKS_IP'),
                env('PROXY_SOCKS_PORT'),
                env('PROXY_SOCKS_LOGIN'),
                env('PROXY_SOCKS_PASSWORD')
            ) : null)));

        $dialogueBot->getUpdatesHandler()->configGetUpdatesMethod(10);

        $dialogueBot->addCommands([
            new StartCommand()
        ]);

        $dialogueBot->startUpdatesLoop();
    }
}
