<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\AskGmail\QueryManager;
    
    $client = require('_base.php');
    
    $queryManager = QueryManager::build($client);
    
    $labels = $queryManager->label->_list('me');

?>

<?php foreach($labels as $label): ?>
<a href='/get_label?id=<?php echo $label->getId() ?>'>Label <?php echo $label->getId() ?></a>
<hr />
<?php endforeach; ?>
<?php echo var_dump($labels) ?>
