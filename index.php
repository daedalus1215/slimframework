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


$container['db'] = function () {
    $db = new PDO('mysql:host=localhost;dbname=slim_demo', 'root', 'root');
    return $db;
};



$app->get('/', function ($request, $response) {
    $users = $this->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);
    var_dump($users);
})->setName('home');





$app->run();