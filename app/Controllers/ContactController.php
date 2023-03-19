<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ContactController extends Controller
{
    /**
     * @param $container
     */
    public function __construct($container)
    {
        parent::__construct($container);
        $this->privacy_mode = false;
    }

    /**
     * @param Request $request
     * @param Request $response
     */
    public function contact(Request $request, Response $response)
    {
        return $this->privacy_mode ? $this->container->get('view')->render($response, 'auth/private.twig') : $this->container->get('view')->render($response, 'home/contact.twig');
    }
}
