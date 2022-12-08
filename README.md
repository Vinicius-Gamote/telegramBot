# TelegramBot
Projeto universitário de um chatbot integrado ao telegram

## Bibliotecas e Tecnologias utilizadas
Desenvolvido em php, utilizando composer wrapper e BotFather do telegram

## Instruções de uso
Primeiramente, crie um bot através de sua conta no telegram. Abra a barra de pesquisa, e procure por BotFather com o símbolo de verificado ao lado, como mostra imagem abaixo

![image](https://user-images.githubusercontent.com/66044199/206327732-87441437-d848-4914-9fcd-b261cd66228f.png)

Após isso, entre no chat e digite /start, /newbot e de um nome para o seu bot seguindo as instruções da tela.
Uma vez feito, o telegram lhe dará um token de acesso para requisições http. Guarde-o.

Com ele em mãos, faça uma chamada get pelo navegador, utilizando o endpoint https://api.telegram.org/bot<<seu_token>>/getUpdates e guarde seu chat_id (lembrando que para o chat_id aparecer, é necessario ter enviado uma mensagem para seu bot).
Feito isso, bastou criar uma api php com essa chamada, para que tenhamos os dados da conversa.

Com a chamada criada, instale o gerenciador de dependências composer: https://getcomposer.org/doc/00-intro.md
Instalado, abra o terminal e rode o seguinte comando:
composer require telegram-bot/api (o composer ira baixar as dependências do telegram ao seu projeto. Para mais detalhes, https://packagist.org/packages/telegram-bot/api).

Feito isso, o método sendMessage será responsável por enviar/responder suas mensagens ao bot.
Você pode inserir, dentro da pasta config, o arquivo config.php, o seu token e o seu chat_id, para que o projeto responda/envie as mensagens para o seu próprio bot.

## Funcionamento

O projeto possui 2 integrações com api´s públicas: MovieDb (fornece informações sobre filmes), e ViaCEP (consultas por CEP).
Segue documentações:</br>
https://developers.themoviedb.org/3/getting-started/introduction</br>
https://viacep.com.br/

Ao executar o código, uma mensagem de boas vindas sera enviada pelo bot, e, caso digite um CEP para o bot, e em nossa aplicação, enviarmos uma resposta, ele ira fazer uma busca no ViaCEP, e retornara dados do logradouro e cidade.
Caso digite o nome de um filme em inglês, ele ira fazer uma requisição ao moviedb e irá retiornar o título, junto a sinopse do filme.
