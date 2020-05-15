<?php
namespace App\Console\Commands\SubnailBot\Commands;

use afagorn\DialogueTelegramBot\Commands\Command;

class StartCommand extends Command
{
    function setName()
    {
        $this->name = 'start';
    }

    function handle(string $param = '')
    {
        $this->telegramAPI->sendChatAction('typing');

        $this->telegramAPI->sendMessage(
            "Привет! Вы запустили команду '$this->name' \n" .
            (!empty($param) ? "Ваш текущий параметр $param" : "Вы не указали параметра для команды") . "\n\n" .
            "Ваш любимый бот"
        );
    }
}
