<?php

use App\Controllers\ExampleController;
use App\Controllers\TopicController;
use App\Middleware\UnAuthenticatedRedirect;

// Different ways of handling routes.

// 1. Anonymous route handler
$app->get('/login', function () {
    return 'login';
})->setName('login');


// 2. Named route handler
//$app->get('/login', $loginHandler);






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

$app->group('', function () {
    // 3. Route Controller
    $this->get('/topics',  TopicController::class . ':index');

    // 4. Route Controller with Middleware
    $this->get('/topics/create',  TopicController::class . ':show');

})->add(new UnAuthenticatedRedirect($container))->add($tokenMiddleware);


