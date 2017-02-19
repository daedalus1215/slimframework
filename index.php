<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/18/2017
 * Time: 5:23 PM
 */
require 'vendor/autoload.php';


$app = new \Slim\App([
    'settings' => [
        // turn on error displaying. Warning: turn to false when in Production.
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
      'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};


$app->get('/contact', function ($request, $response) {
    echo $this->view->render($response, 'contact.twig');
})->setName('contact');

$app->get('/contact/confirm', function ($request, $response) {
    return $this->view->render($response, 'contact_confirm.twig');
});

$app->post('/contact', function ($request, $response) {
    return $response->withRedirect('http://slim.com/contact/confirm');
})->setName('contact');







$app->get('/', function ($request, $response) {
    echo $this->view->render($response, 'home.twig');
})->setName('home');


$app->get('/users', function ($request, $response) {

    $user = [
        ['username' => 'billy'],
        ['username' => 'alex'],
        ['username' => 'james'],
        ['username' => 'morgan'],

    ];


    echo $this->view->render($response, 'users.twig', [
        'users' => $user //exposing user variable with the value Billy.
    ]);
})->setName('users.index');





$app->run();