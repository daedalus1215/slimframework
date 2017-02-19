<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 2:53 PM
 */

namespace App\Controllers;

use App\Models\User;
use Interop\Container\ContainerInterface;

class UserController extends AbstractController
{
    public function index($request, $response)
    {
        $users = $this->c->db->query->query("SELECT * FROM users")->fetchAll(\PDO::FETCH_CLASS, User::class);


        return $this->c->view->render($response, 'users/index.twig');
    }

    public function show()
    {
        return 'Show single topic';
    }
}