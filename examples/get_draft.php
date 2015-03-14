<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(new Google_Service_Gmail($client));

    $draft = $queryManager->getDraft('me', $_GET['id']);

?>
<h3>Message Id</h3>
<?php echo $draft->getMessage()->getId(); ?>
<hr />
<?php echo var_dump($draft); ?>
