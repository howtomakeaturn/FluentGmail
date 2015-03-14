<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    
    $client = require('_base.php');
    
    $queryManager = QueryManager::build($client);
    
    $profile = $queryManager->profile->get('me');

    $drafts = $queryManager->draft->_list('me');

?>

<?php foreach($drafts as $draft):?>
    <a href='/get_draft?id=<?php echo $draft->getId() ?>'>Draft <?php echo $draft->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($drafts); ?>
