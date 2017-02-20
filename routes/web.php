<?php

use App\Controllers\ExampleController;
use App\Controllers\TopicController;

$app->get('/redirect', ExampleController::class . ':redirect');
$app->get('/landing', ExampleController::class . ':landing')->setName('landing');
$app->get('/topics',  TopicController::class . ':index');
$app->get('/topics/{id}',  TopicController::class . ':show');