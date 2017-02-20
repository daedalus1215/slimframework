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
        return $response->withStatus(404);
        //return 'hi';
    }

    public function show($request, $response, $args)
    {
        $topic = $this->c->db->prepare("SELECT * FROM topics WHERE id = :id");
        $topic->execute(['id' => $args['id']]);
        $topic = $topic->fetch(\PDO::FETCH_OBJ);
        if ($topic === false) {
            $this->render404($response);
        }

        return $this->c->view->render($response, 'topics/show.twig', compact('topic'));
    }
}