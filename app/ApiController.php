<?php

namespace app;

class ApiController
{
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

    public static function sendMessage(string $message): bool
    {
        try 
        {
            $bot = new \TelegramBot\Api\BotApi(TOKEN);

            $bot->sendMessage(CHAT_ID, $message);

            return true;
        } catch (\Exception $ex) 
        {
            return false;
        }
    }
}