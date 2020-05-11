<?php

namespace DialogueTelegramBotSDK;

class CommandHandler
{
    public function handleMessageCommand(string $message)
    {
        return $this->parseCommand($message);
    }

    public function parseCommand(string $message)
    {
        if (trim($message) === '')
            throw new \InvalidArgumentException('Message is empty, Cannot parse for command');

        preg_match('/^\/([^\s@]+)@?(\S+)?\s?(.*)$/', $message, $matches);

        return $matches;
    }
}
