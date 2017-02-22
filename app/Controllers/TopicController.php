<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 2:34 PM
 */

namespace App\Controllers;


use App\Models\Topic;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class TopicController extends AbstractController
{
    /**
     * @param Request $request
     * @param Response $response
     */
    public function index($request, $response)
    {
        return 'Topic index';

    }

    public function show($request, $response)
    {
        // get the CSFR token.
        echo $request->getAttribute('token');

        return 'topic show';
    }


    public function create($request, $response)
    {
        return 'create page';
    }
}