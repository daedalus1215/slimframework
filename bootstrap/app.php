<?php


$app = new \Slim\App([
    'settings' => [
    // turn on error displaying. Warning: turn to false when in Production.
    'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();


require __DIR__ .'/../config/view-config.php';

require __DIR__ . '/../config/db-config.php';



$middleware = function ($request, $response, $next) {
    //
    $response->getBody()->write('Before');

    // calls the next middleware.
    $response = $next($request, $response);

    // next middle ware being added to. We want to run this 'After' response receives by user.
    $response->getBody()->write('After');

    // don't forget to return response.
    return $response;
};





require __DIR__ . '/../routes/web.php';

