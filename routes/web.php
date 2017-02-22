<?php

use App\Middleware\IpFilter;


// Adding global middleware.
$app->add(new IpFilter($container['db']));

$app->get('/', function () {
    return 'Home';
});

$app->get('/login', function () {
   return 'Login';
});