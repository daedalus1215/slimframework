<?php
namespace App\Middleware;
use Interop\Container\ContainerInterface;

/**
 * Make sure user is authenticated, if not then redirect.
 *
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/20/2017
 * Time: 4:38 PM
 */
class UnAuthenticatedRedirect
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $c)
    {
        $this->container = $c;
    }

    public function __invoke($request, $response, $next)
    {
        if (empty($_SESSION['user_id'])) {
            $response = $response->withRedirect($this->container->router->pathFor('login'));
        }

        return $next($request, $response);
    }

}