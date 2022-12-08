<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    use \app\ApiController;

    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/config/config.php';

    $welcomeMessage = 'Olá! Digite um CEP para consulta, ou o nome de um filme em inglês!';

    ApiController::sendMessage($welcomeMessage); 
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot Telegram</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="max-width box">
        <h1>ChatBot Telegram</h1>
        <textarea class="form-control" placeholder="Se preferir, envie uma mensagem personalizada" id="txtMessage"></textarea>

        <button type="button" class="btn btn-success w-100" id="btnAnswer">Answer</button>
    </div>

<script src="script.js"></script>
</body>
</html>