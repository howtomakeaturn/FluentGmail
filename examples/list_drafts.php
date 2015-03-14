<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(new Google_Service_Gmail($client));

    $profile = $queryManager->getProfile('me');

    $drafts = $queryManager->listDrafts('me');

?>

<?php echo var_dump($drafts); ?>
