<?php

use \app\ApiController;

require __DIR__.'/vendor/autoload.php';

// $chatId = \app\ApiController::getChatId(TOKEN);
// echo $chatId;

ApiController::sendMessage('Hello Telegram!');