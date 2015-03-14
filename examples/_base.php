<?php
require_once('../vendor/autoload.php');

use \Howtomakeaturn\FluentGmail\GoogleClientBuilder;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$path = 'storage/token.json';

$token = file_get_contents($path);

$config = require('config.php');

$client = GoogleClientBuilder::build($config, $token);

return $client;
