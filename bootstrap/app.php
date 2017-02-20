<?php
session_start();
$_SESSION['user_id'] = 0;

$app = new \Slim\App([
    'settings' => [
    // turn on error displaying. Warning: turn to false when in Production.
    'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();


require __DIR__ .'/../config/view-config.php';

require __DIR__ . '/../config/db-config.php';


require __DIR__ . '/../routes/web.php';

