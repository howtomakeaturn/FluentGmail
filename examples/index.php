<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Authenticator;
    use \Howtomakeaturn\AskGmail\GoogleClientManager;
    use \Howtomakeaturn\AskGmail\Manager;
    use \Howtomakeaturn\AskGmail\QueryManager;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $manager = new Manager();

    $path = 'storage/token.json';

    $token = $manager->token($path);

    $clientManager = new GoogleClientManager(new Google_Client());

    $config = require('config.php');
    
    $clientManager->setConfig($config);

    $clientManager->setAccessToken($token);        
    
    $client = $clientManager->getGoogleClient();

    $service = new Google_Service_Gmail($client);
    
    $queryManager = new QueryManager($service);

    $profile = $queryManager->getProfile($service, 'me');
    // $histories = $queryManager->listHistory($service, 'me', null);

?>

Main Index.

<hr />

<?php

echo var_dump($profile);
