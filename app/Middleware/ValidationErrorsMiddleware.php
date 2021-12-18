<?php

namespace LoginApp\Middleware;

class ValidationErrorsMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {
    // add the errors to the env so that twig can see them
    $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
    // remove it from the php namespace
    unset($_SESSION['errors']);

    // cycle through all the errors
    $response = $next($request, $response);
    return $response;
  }
}
