<?php

use App\Controllers\ExampleController;
use App\Controllers\TopicController;

$app->get('/redirect', ExampleController::class . ':redirect');
$app->get('/landing', ExampleController::class . ':landing')->setName('landing');

// must add the middleware to the route.
$app->get('/topics',  TopicController::class . ':index')->add($middleware);
