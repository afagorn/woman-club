<?php
namespace App\Console\Commands\SubnailBot\Commands;

use afagorn\DialogueTelegramBot\Commands\Command;
use App\Services\User\CustomerService;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\Telegram\Types\Inline\Keyboard\Button;
use unreal4u\TelegramAPI\Telegram\Types\Inline\Keyboard\Markup;

class StartCommand extends Command
{
    function setName()
    {
        $this->name = 'start';
    }

    function handle(string $param = '')
    {
        $customerService = new CustomerService();

        if(empty($param)) {
            $this->telegramAPI->sendMessage('Привет! Здесь вы можете оплатить подписку на наши каналы');
            return;
        }

        if(is_null($inviteData = $customerService->registerToTelegram($param, $this->update->message->from->username))) {
            $this->telegramAPI->sendMessage('Вы перешли по неправильной ссылке или она уже была активирована');
            return;
        }

        $m = new SendMessage();
        $m->chat_id = $this->update->message->chat->id;
        $m->text = 'Вы успешно зарегистрированы и можете вступить в канал';
        $m->reply_markup = new Markup();

        $i=0;
        foreach ($inviteData->order->products as $product) {
            $button = new Button();
            $button->text = 'Вступить в канал ' . $product->name;
            $button->url = $product->invite_link;

            $m->reply_markup->inline_keyboard[$i][] = $button;
            $i++;
        }

        $this->telegramAPI->performApiRequest($m);
    }



}
