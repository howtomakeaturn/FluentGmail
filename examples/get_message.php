<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\FluentGmail;
    
    $client = require('_base.php');
    
    $queryManager = FluentGmail::build($client);
    
    $message = $queryManager->message->get('me', $_GET['id']);

?>
<h3>Message Id</h3>
<?php echo $message->getId(); ?>
<hr />
<?php echo var_dump($message); ?>
