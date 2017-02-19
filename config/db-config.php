<?php

$container['db'] = function () {
    $db = new PDO('mysql:host=localhost;dbname=slim_demo', 'root', 'root');
    return $db;
};