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
    
    $messages = $queryManager->message->_list('me');

?>
<?php foreach($messages as $message):?>
    <a href='/get_message?id=<?php echo $message->getId() ?>'>Message <?php echo $message->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($messages); ?>
