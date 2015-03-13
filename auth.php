<?php
    require_once('vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Authenticator;
    use \Howtomakeaturn\AskGmail\GoogleClientManager;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $clientManager = new GoogleClientManager(new Google_Client());

    $config = [
        'clientId' => '198663035027-fucqv7fhr8co4svrfdosmlt0mm4jquev.apps.googleusercontent.com',  
        'clientSecret' => 'lejFNh1LkYzlPQld00Xj5iKB',
        'redirectUri' => 'http://gmail/oauth2callback',
        'scopes' => [
            'https://www.googleapis.com/auth/gmail.modify',
            'https://www.googleapis.com/auth/gmail.readonly',
            'https://www.googleapis.com/auth/gmail.compose',
            'https://mail.google.com/'
        ]
    ];

    $clientManager->setConfig($config);
    
    $client = $clientManager->getGoogleClient();

    $authenticator = new Authenticator($client);

    $url = $authenticator->createAuthUrl();

?>

<a href='<?php echo $url ?>'>Authenticate now</a>
