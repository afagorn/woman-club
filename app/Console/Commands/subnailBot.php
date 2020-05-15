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
                '94.177.239.9',
                '7080',
                'sockd',
                'sockdpasswd'
            ) : null)));

        $dialogueBot->getUpdatesHandler()->configGetUpdatesMethod(10);

        $dialogueBot->addCommands([
            new StartCommand()
        ]);

        $dialogueBot->startUpdatesLoop();
    }
}
