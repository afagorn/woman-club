<?php
namespace DialogueTelegramBotSDK;

use Clue\React\Socks\Client;
use DialogueTelegramBotSDK\DTO\ProxyDTO;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use unreal4u\TelegramAPI\Abstracts\TelegramMethods;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use unreal4u\TelegramAPI\TgLog;

class TelegramAPI
{
    /**
     * @var TgLog
     */
    public $tgLog;

    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * TelegramAPI constructor.
     * @param string $botToken
     * @param ProxyDTO|null $proxyDTO
     */
    public function __construct(string $botToken, ProxyDTO $proxyDTO = null)
    {
        $this->init($botToken, $proxyDTO);
    }

    public function performApiRequest(TelegramMethods $method)
    {
        return $this->tgLog->performApiRequest($method);
    }

    public function sendMessage(string $text, string $chatId)
    {
        $sendMessage = new SendMessage();
        $sendMessage->text = $text;
        $sendMessage->chat_id = $chatId;
        $this->performApiRequest($sendMessage);
    }

    /**
     * Отправка любого метода и необязательный callback после отправки
     * @param TelegramMethods $method
     * @param callable $callback
     */
    public function sendMethod(TelegramMethods $method, callable $callback = null)
    {
        $promise = $this->tgLog->performApiRequest($method);

        $promise->then(
            $callback,
            function (\Exception $exception) {
                echo 'Exception ' . get_class($exception) . ' caught, message: ' . $exception->getMessage();
            }
        );

        $this->loop->run();
    }


    private function init(string $botToken, ProxyDTO $proxyDTO = null)
    {
        $loop = Factory::create();

        $options = [];
        if(!is_null($proxyDTO)) {
            $proxy = new Client($proxyDTO->getSocksUrl(), new \React\Socket\Connector($loop));
            $options = array_merge($options, [
                'tcp' => $proxy,
                'timeout' => 3.0,
                'dns' => false
            ]);
        }
        $handler = new HttpClientRequestHandler($loop, $options);
        $tgLog = new TgLog($botToken, $handler);

        $this->loop = $loop;
        $this->tgLog = $tgLog;
    }
}
