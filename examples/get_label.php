<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\FluentGmail\FluentGmail;
    
    $client = require('_base.php');
    
    $queryManager = FluentGmail::build($client);
    
    $label = $queryManager->label->get('me', $_GET['id']);

?>
<?php echo $label->getName() ?>
<hr />
<?php echo var_dump($label) ?>
