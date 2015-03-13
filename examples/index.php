<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Authenticator;
    use \Howtomakeaturn\AskGmail\GoogleClientBuilder;
    use \Howtomakeaturn\AskGmail\Manager;
    use \Howtomakeaturn\AskGmail\QueryManager;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $manager = new Manager();

    $path = 'storage/token.json';

    $token = file_get_contents($path);

    $config = require('config.php');

    $client = GoogleClientBuilder::build($config, $token);

    $service = new Google_Service_Gmail($client);
    
    $queryManager = new QueryManager($service);

    $profile = $queryManager->getProfile($service, 'me');
    // $histories = $queryManager->listHistory($service, 'me', null);

?>

Main Index.

<hr />

<?php

echo var_dump($profile);
