<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\FluentGmail\Authenticator;

    $client = require('_base.php');

    $authenticator = new Authenticator($client);
    
    $token = $authenticator->accessToken();

    $path = 'storage/token.json';

    file_put_contents($path, $token);

?>

Done. Token saved.
