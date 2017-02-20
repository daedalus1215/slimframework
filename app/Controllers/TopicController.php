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
        $topics = $this->c->db->query('SELECT * FROM topics')->fetchAll(\PDO::FETCH_OBJ);


        return $response->withJson($topics, 200);

    }
}