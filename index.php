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







$app->get('/', function ($request, $response) {
    echo $this->view->render($response, 'home.twig');
});


$app->get('/users', function ($request, $response) {
    echo $this->view->render($response, 'users.twig');
});


/*$app->get('/users', function () {
    echo 'Users';
});*/

//@todo: stopped at rendering a view.

$app->run();