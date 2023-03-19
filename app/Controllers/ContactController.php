<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use DI\Container;

class ContactController extends Controller
{
    /**
     * @param Container $container The slim container.
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->privacy_mode = false;
    }

    /**
     * @param Request  $request  The request object.
     * @param Response $response The response object.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function contact(Request $request, Response $response)
    {
        return $this->privacy_mode
            ? $this->container->get('view')->render($response, 'auth/private.twig')
            : $this->container->get('view')->render($response, 'home/contact.twig');
    }
}
