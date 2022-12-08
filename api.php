<?php

use \app\ApiController;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config/config.php';

$message = filter_input(INPUT_GET, 'm', FILTER_UNSAFE_RAW);

ApiController::getTypeMessage(TOKEN, MOVIE_API_KEY);

if ($message)
{  
    if(ApiController::sendMessage($message))
    {
        jsonResponse('Mensagem não enviada, erro interno!', -1, 500);
    }

    jsonResponse('Mensagem enviada!', 1, 200);
} else 
{
    jsonResponse('Mensagem não encontrada!', -10, 404);
}

function jsonResponse(string $message, int $result, int $httpCode = 200)
{
    http_response_code($httpCode);
    header('Content-type: application/json');

    echo json_encode([
        'msg' => $message,
        'result' => $result
    ]);
}