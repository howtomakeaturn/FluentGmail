<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Authenticator;
    use \Howtomakeaturn\AskGmail\GoogleClientBuilder;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $config = require('config.php');

    $client = GoogleClientBuilder::build($config);

    $authenticator = new Authenticator($client);

    $path = 'storage/token.json';

    $authenticator->processAndSaveToken($path);

?>

Done. Token saved.
