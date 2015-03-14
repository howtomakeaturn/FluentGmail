<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = QueryManager::build($client);

    $profile = $queryManager->profile->get('me');

?>

<?php echo var_dump($profile); ?>
