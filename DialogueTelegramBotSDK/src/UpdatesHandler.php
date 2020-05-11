<?php
namespace DialogueTelegramBotSDK;

use unreal4u\TelegramAPI\Abstracts\TraversableCustomType;
use unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;
use unreal4u\TelegramAPI\Telegram\Types\Update;

class UpdatesHandler
{
    /**
     * @var GetUpdates
     */
    private $getUpdatesMethod;

    /**
     * @var TelegramAPI
     */
    private $telegramAPI;

    /**
     * @var CommandHandler
     */
    private $commandHandler;

    /**
     * UpdatesHandler constructor.
     * @param TelegramAPI $telegramAPI
     * @param GetUpdates $getUpdatesMethod
     */
    public function __construct(TelegramAPI $telegramAPI, GetUpdates $getUpdatesMethod)
    {
        $this->telegramAPI = $telegramAPI;
        $this->getUpdatesMethod = $getUpdatesMethod ?? new GetUpdates();
        $this->commandHandler = new CommandHandler();
    }

    /**
     * В цикле получаем обновления и обрабатываем каждое
     */
    public function startLoop()
    {
        $this->telegramAPI->sendMethod(
            $this->getUpdatesMethod,
            function (TraversableCustomType $updatesArray) {

                //var_dump($updatesArray);

                if(!empty($updatesArray->data)) {
                    foreach ($updatesArray as $update)
                        $this->updateHandle($update);

                    $this->increaseUpdatesOffset($update->update_id);
                }

                $this->startLoop();
            }
        );
    }

    /**
     * @param Update $update
     */
    private function updateHandle(Update $update)
    {
        var_dump($update->update_id);
        var_dump($update->message->text);
        //Если это команда, то пропарсить и запустить команду
        if(isset($update->message->entities)) {
            foreach ($update->message->entities as $entity) {
                if($entity->type == 'bot_command') {
                    $res = $this->commandHandler->handleMessageCommand($update->message->text);
                    var_dump($res);
                    return;
                }
            }
        }

        //Если это текст, то вывести заглушку
        $this->telegramAPI->sendMessage('Пожалуйста, отправьте мне комманду', $update->message->chat->id);

        return;
    }

    /**
     * @param int $currentUpdateId
     */
    private function increaseUpdatesOffset(int $currentUpdateId)
    {
        $this->getUpdatesMethod->offset = $currentUpdateId + 1;
    }
}
