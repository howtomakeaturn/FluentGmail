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

    $url = $authenticator->createAuthUrl();

?>

<a href='<?php echo $url ?>'>Authenticate now</a>
