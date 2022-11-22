<?php

require_once('vendor/autoload.php');

// $chatId = \app\ApiController::getChatId(TOKEN);
// echo $chatId;

\app\ApiController::sendMessage("Hello Telegram!");