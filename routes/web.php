<?php

use App\Controllers\ExampleController;
use App\Controllers\TopicController;


$authenticatedMiddleware = function ($request, $response, $next) use ($container) {
    if (true) {
        $response = $response->withRedirect($container->router->pathFor('login'));
    }

    return $next($request, $response);
};

// must add the middleware to the route.
$app->get('/topics',  TopicController::class . ':index');
$app->get('/topics/{id}',  TopicController::class . ':show')->add($authenticatedMiddleware);



$app->get('/login', function () {
    return 'login';
})->setName('login');