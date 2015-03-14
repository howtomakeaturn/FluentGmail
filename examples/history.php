<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\Manager;
    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(new Google_Service_Gmail($client));

    $profile = $queryManager->getProfile('me');

    $histories = $queryManager->listHistory('me', $profile->historyId);

?>

<?php echo var_dump($histories); ?>
