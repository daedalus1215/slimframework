<?php

// user profile example
$app->get('/users/{username}', function ($request, $response, $args) {

    $user = $this->db->prepare("SELECT * FROM users WHERE username = :username");
    $user->execute([
        'username' => $args['username']
    ]);

    $user = $user->fetch(PDO::FETCH_OBJ);

    return $this->view->render($response, 'users/profile.twig', [
        'user' => $user
    ]);
})->setName('home');