<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(new Google_Service_Gmail($client));

    $profile = $queryManager->getProfile('me');

    $drafts = $queryManager->listDrafts('me');

?>

<?php foreach($drafts as $draft):?>
    <a href='/get_draft?id=<?php echo $draft->getId() ?>'>Draft <?php echo $draft->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($drafts); ?>
