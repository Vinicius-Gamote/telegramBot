<?php

use \app\ApiController;

require __DIR__.'/vendor/autoload.php';

const TOKEN = '5887391770:AAGl5PelXlryK0M7Hd8KVKSRnpvsTf0xr90';
const CHAT_ID = 5783929736;

// $chatId = \app\ApiController::getChatId(TOKEN);
// echo $chatId;

// ApiController::sendMessage('Hello Telegram!');
ApiController::getChatCep(TOKEN);