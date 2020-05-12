<?php
namespace DialogueTelegramBotSDK\Commands;

interface ICommand
{
    function setName();

    function getName();

    function handle(string $param = '');
}
