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

    $url = $authenticator->createAuthUrl();

?>

<a href='<?php echo $url ?>'>Authenticate now</a>
