<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 8:23 PM
 */

namespace App\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class ExampleController extends AbstractController
{
    /**
     * @param Request $request
     * @param Response $response
     */
    public function redirect($request, $response)
    {
        return $response->withRedirect($this->c->router->pathFor('landing'));
    }

    /**
     * @param Request $request
     * @param Response $response
     */
    public function landing($request, $response)
    {
        return 'Landing';
    }
}