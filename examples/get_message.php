<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    use \Howtomakeaturn\AskGmail\Query\Draft;
    use \Howtomakeaturn\AskGmail\Query\Profile;
    use \Howtomakeaturn\AskGmail\Query\Message;
    
    $client = require('_base.php');
    
    $queryManager = new QueryManager(
        new Draft(
            new Google_Service_Gmail($client)
        ),
        new Profile(
            new Google_Service_Gmail($client)
        ),
        new Message(
            new Google_Service_Gmail($client)
        )        
    );
    
    $message = $queryManager->message->get('me', $_GET['id']);

?>
<h3>Message Id</h3>
<?php echo $message->getId(); ?>
<hr />
<?php echo var_dump($message); ?>
