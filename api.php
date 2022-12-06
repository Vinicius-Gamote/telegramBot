<?php

use \app\ApiController;

$message = filter_input(INPUT_GET, 'm', FILTER_UNSAFE_RAW);

if ($message)
{
    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/config/config.php';
    
    ApiController::getChatCep(TOKEN);

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