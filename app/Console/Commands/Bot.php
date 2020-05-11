<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use unreal4u\TelegramAPI\Abstracts\TraversableCustomType;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\Telegram\Methods\GetUpdates;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\TgLog;
use Clue\React\Socks\Client;

class Bot extends Command
{
    const BOT_TOKEN = '1248330469:AAG-NNYbXLEuQaXCp2TufeiRy66Z30nukl0';

    const PROXY_ADDRESS = '94.177.239.9';
    const PROXY_PORT = '7080';
    const PROXY_PASSWORD = 'sockdpasswd';
    const PROXY_LOGIN = 'sockd';

    /**
     * @var TgLog
     */
    private $tgLog;

    /**
     * @var LoopInterface
     */
    private $loop;

    private $i;

    private $getUpdates;

    protected $signature = 'bot:start';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();

        $this->init();

        $this->getUpdates = new GetUpdates();
        $this->getUpdates->timeout = 10;
    }

    public function handle()
    {
        $this->bot();
    }

    private function init()
    {
        $loop = Factory::create();
        $proxyUrl = 'socks5://' . self::PROXY_LOGIN . ':' . self::PROXY_PASSWORD . '@' . self::PROXY_ADDRESS . ':' . self::PROXY_PORT;
        $proxy = new Client($proxyUrl, new \React\Socket\Connector($loop));
        $handler = new HttpClientRequestHandler($loop, [
            'tcp' => $proxy,
            'timeout' => 3.0,
            'dns' => false
        ]);

        //$handler = new HttpClientRequestHandler($loop);
        $tgLog = new TgLog(self::BOT_TOKEN, $handler);

        $this->loop = $loop;
        $this->tgLog = $tgLog;
    }

    private function increaseUpdatesOffset(int $offsetNumber)
    {
        $this->getUpdates->offset = $offsetNumber + 1;
    }

    private function bot()
    {
        //https://t.me/submileBot?start=test_url3
        $this->echoRow(++$this->i, 'Counted');

        $updatePromise = $this->tgLog->performApiRequest($this->getUpdates);

        $updatePromise->then(
            function (TraversableCustomType $updatesArray) {
                if(empty($updatesArray->data)) {
                    $this->echoRow('Обновление не найдено');
                    //return;
                }

                foreach ($updatesArray as $update) {
                    $this->increaseUpdatesOffset($update->update_id);
                    $this->echoRow($update->update_id, 'Update id');
                    $this->echoRow($update->message->message_id, 'Message id');
                    $this->echoRow($update->message->text, 'Text');
                    if(isset($update->message->entities)) {
                        foreach ($update->message->entities as $entity) {
                            if($entity->type == 'bot_command') {

                                $res = preg_match('/(\/start\s)[$\w#&]*/', $update->message->text);
                                //(\/start\s)[$\w|#|&]*

                                $this->echoRow('Найдена команда бота');

                                $sendMessage = new SendMessage();
                                $sendMessage->text = 'Hello world!';
                                $sendMessage->chat_id = $update->message->chat->id;
                                $this->tgLog->performApiRequest($sendMessage);

                                //var_dump($entity);
                            }
                            else
                                $this->echoRow('Найден новый тип сообщения - ' . $entity->type);
                        }
                    }

                    //var_dump($update->message);

                    $this->echoRow('-----------------');
                }

                $this->bot();
            },
            function (\Exception $exception) {
                echo 'Exception ' . get_class($exception) . ' caught, message: ' . $exception->getMessage();
            }
        );

        $this->loop->run();
    }

    private function echoRow(string $message = '', string $title = null)
    {
        echo (!is_null($title) ? $title . ': ' : '') . $message . PHP_EOL;
    }
}
