<?php

use App\Controllers\TopicController;

$app->get('/topics', TopicController::class);