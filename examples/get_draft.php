<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\FluentGmail;
    
    $client = require('_base.php');
    
    $queryManager = FluentGmail::build($client);
        
    $draft = $queryManager->draft->get('me', $_GET['id']);

?>
<h3>Message Id</h3>
<?php echo $draft->getMessage()->getId(); ?>
<hr />
<?php echo var_dump($draft); ?>
