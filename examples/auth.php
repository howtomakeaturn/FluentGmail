<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\FluentGmail\Authenticator;

    $client = require('_base.php');

    $authenticator = new Authenticator($client);

    $url = $authenticator->createAuthUrl();

?>

<a href='<?php echo $url ?>'>Authenticate now</a>
