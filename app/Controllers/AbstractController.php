<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 2/19/2017
 * Time: 2:54 PM
 */

namespace App\Controllers;
use Interop\Container\ContainerInterface;

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

}