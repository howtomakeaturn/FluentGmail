<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(new Google_Service_Gmail($client));

    $messages = $queryManager->listMessages('me');

?>
<?php foreach($messages as $message):?>
    <a href='/get_message?id=<?php echo $message->getId() ?>'>Message <?php echo $message->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($messages); ?>
