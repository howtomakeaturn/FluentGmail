<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\FluentGmail\Authenticator;

    $client = require('_base.php');

    $authenticator = new Authenticator($client);

    $path = 'storage/token.json';

    $authenticator->processAndSaveToken($path);

?>

Done. Token saved.
