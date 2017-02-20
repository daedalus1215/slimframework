<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 2:54 PM
 */

namespace App\Controllers;
use Interop\Container\ContainerInterface;
use Slim\Http\Response;

abstract class AbstractController
{
    /**
     * @var ContainerInterface
     */
    protected $c;

    /**
     * @param ContainerInterface $c
     */
    public function __construct(ContainerInterface $c)
    {
        $this->c = $c;
    }

    /**
     * @param Response $response
     * @return mixed
     */
    protected function render404($response)
    {
        return $this->c->view->render($response->withStatus(404), 'errors/404.twig');
    }
}