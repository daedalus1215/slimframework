<?php

use App\Controllers\ExampleController;


$app->get('/redirect', ExampleController::class . ':redirect');
$app->get('/landing', ExampleController::class . ':landing')->setName('landing');
