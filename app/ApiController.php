<?php

namespace app;

use TelegramBot\Api\BotApi;

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
            return null;

        return $arr['result'][0]['message']['chat']['id'];
    }

    public static function getTypeMessage(string $token, string $api_key)
    {
            $chatIdEndpoint = "https://api.telegram.org/bot{$token}/getUpdates";
    
            $chatContent = file_get_contents($chatIdEndpoint);
    
            if ($chatContent == '' || $chatContent == null)
                return null;
    
            $arr = json_decode($chatContent, true);
    
            $lastMessage = end($arr['result']);
    
            if (filter_var($lastMessage['message']['text'], FILTER_SANITIZE_NUMBER_INT) && strlen($lastMessage['message']['text']) == 8)
            {
                $cep = $lastMessage['message']['text'];
                $cepEndpoint = "https://viacep.com.br/ws/{$cep}/json";
                $cepContent = file_get_contents($cepEndpoint);
    
                if ($cepContent == '' || $cepContent == null)
                    return null;
                
                $data = json_decode($cepContent, true);
    
                $message = "O cep: {$data['cep']}, se situa na {$data['logradouro']}, {$data['bairro']} em {$data['localidade']}";
    
                $app = new ApiController();
    
                $app->sendMessage($message);
            } else 
            {
                $movie = $lastMessage['message']['text'];
    
                $movieEndpoint = "https://api.themoviedb.org/3/search/movie?api_key={$api_key}&language=en-US&query={$movie}&page=1&include_adult=true";
    
                $movieContent = file_get_contents($movieEndpoint);
    
                if ($movieContent == '' || $movieContent == null)
                        return null;
    
                $data = json_decode($movieContent, true);
    
                $message = "Titulo do filme: {$data['results'][0]['original_title']} \nDescrição: {$data['results'][0]['overview']}";
    
                $app = new ApiController();
    
                $app->sendMessage($message);
            }
    }

    public static function sendMessage($message)
    {
        $bot = new BotApi(TOKEN);

        return $bot->sendMessage(CHAT_ID, $message);
    }
}