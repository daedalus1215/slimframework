<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 2:34 PM
 */

namespace App\Controllers;


use Interop\Container\ContainerInterface;

class TopicController extends AbstractController
{
    public function index($request, $response)
    {
        return $this->c->view->render($response, 'topics/index.twig');
    }

    public function show()
    {
        return 'Show single topic';
    }
}