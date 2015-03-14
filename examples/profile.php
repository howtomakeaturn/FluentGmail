<?php
    require_once('../vendor/autoload.php');

    use \Howtomakeaturn\FluentGmail\FluentGmail;

    $client = require('_base.php');
    
    $queryManager = FluentGmail::build($client);

    $profile = $queryManager->profile->get('me');

?>

<?php echo var_dump($profile); ?>
