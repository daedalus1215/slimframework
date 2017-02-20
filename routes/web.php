<?php

use App\Controllers\ExampleController;
use App\Controllers\TopicController;


// Different ways of handling routes.

// 1. Anonymous route handler
$app->get('/login', function () {
    return 'login';
});


// 2. Named route handler
//$app->get('/login', $loginHandler);



// 3. Route Controller
$app->get('/topics',  TopicController::class . ':index');



$authenticatedMiddleware = function ($request, $response, $next) use ($container) {
    if (false) {
        $response = $response->withRedirect($container->router->pathFor('login'));
    }

    return $next($request, $response);
};


/**
 * Simulate CSRF
 *
 *
 * @param \Slim\Http\Request $request
 * @param $response
 * @param $next
 * @return mixed
 */
$tokenMiddleware = function ($request, $response, $next) {

    $request = $request->withAttribute('token', 'abc123');

    return $next($request, $response);
};


// 4. Route Controller with Middleware
$app->get('/topics/{id}',  TopicController::class . ':show')
    ->add($authenticatedMiddleware)
    ->add($tokenMiddleware);




