<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    use \Howtomakeaturn\AskGmail\Query\Draft;
    use \Howtomakeaturn\AskGmail\Query\Profile;

    $client = require('_base.php');
    
    $queryManager = new QueryManager(
        new Draft(
            new Google_Service_Gmail($client)
        ),
        new Profile(
            new Google_Service_Gmail($client)
        )
    );

    $profile = $queryManager->profile->get('me');

    $drafts = $queryManager->draft->_list('me');

?>

<?php foreach($drafts as $draft):?>
    <a href='/get_draft?id=<?php echo $draft->getId() ?>'>Draft <?php echo $draft->getId() ?></a>
    <hr />
<?php endforeach; ?>
<hr />
<?php echo var_dump($drafts); ?>
