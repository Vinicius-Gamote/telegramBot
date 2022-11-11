<?php

namespace app;

use TelegramBot\Api\BotApi;

class ApiController
{
    public static function getChatId(string $token) : ?string 
    {
        $chatId = null;
        $chatIdEndpoint = "https://api.telegram.org/bot{$token}/getUpdates";
        $content = file_get_contents($chatIdEndpoint);

        if ($content == '' || $content == null)
            return null;

        $arr = json_decode($content, true);

        if (!isset($arr['result'][0]['message']['chat']['id'])) 
        {
            return null;
        }

        return $chatId;
    }

    public static function sendMessage() : bool
    {
        try 
        {

        } catch (\Exception $ex) 
        {
            return false;
        }

    }
}