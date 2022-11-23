<?php

namespace app;

use TelegramBot\Api\BotApi;

class ApiController
{

    const TOKEN = '5887391770:AAGl5PelXlryK0M7Hd8KVKSRnpvsTf0xr90';
    const CHAT_ID = 5783929736;

    public static function getChatId(string $token): ?string 
    {
        $chatIdEndpoint = "https://api.telegram.org/bot{$token}/getUpdates";
        $content = file_get_contents($chatIdEndpoint);

        if ($content == '' || $content == null)
            return null;

        $arr = json_decode($content, true);

        if (!isset($arr['result'][0]['message']['chat']['id'])) 
        {
            return null;
        }

        return $arr['result'][0]['message']['chat']['id'];
    }

    public static function sendMessage($message)
    {
        $bot = new BotApi(self::TOKEN);

        return $bot->sendMessage(self::CHAT_ID, $message);
    }
}