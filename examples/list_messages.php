<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    
    $client = require('_base.php');
    
    $queryManager = QueryManager::build($client);
    
    $messages = $queryManager->message->_list('me');

?>
<?php foreach($messages as $message):?>
    <a href='/get_message?id=<?php echo $message->getId() ?>'>Message <?php echo $message->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($messages); ?>
