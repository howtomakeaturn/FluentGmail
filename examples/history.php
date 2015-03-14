<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    
    $client = require('_base.php');
    
    $queryManager = QueryManager::build($client);
    
    $profile = $queryManager->profile->get('me');

    $histories = $queryManager->history->_list('me', $profile->historyId);

?>

<?php echo var_dump($histories) ?>
