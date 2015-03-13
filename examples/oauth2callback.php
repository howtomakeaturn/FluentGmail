<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Authenticator;
    use \Howtomakeaturn\AskGmail\GoogleClientManager;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $clientManager = new GoogleClientManager(new Google_Client());

    $config = require('config.php');

    $clientManager->setConfig($config);

    $client = $clientManager->getGoogleClient();

    $authenticator = new Authenticator($client);

    $path = 'storage/token.json';

    $authenticator->processAndSaveToken($path);

?>

Done. Token saved.
