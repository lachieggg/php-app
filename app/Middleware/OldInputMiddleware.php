<?php

namespace LoginApp\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class OldInputMiddleware extends CustomMiddleware implements MiddlewareInterface {
    /**
     * @var \Slim\Interfaces\RouterInterface
     */
    protected $router;

    /**
     * @var \Slim\Interfaces\FlashInterface
     */
    protected $flash;

    /**
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        if (isset($_SESSION['old_input'])) {
            $this->container->view->getEnvironment()->addGlobal('old_input', $_SESSION['old_input']);
            $_SESSION['old_input'] = $request->getParams();
        }

        return $handler->handle($request);
    }
}
