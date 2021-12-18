<?php

namespace LoginApp\Middleware;

class ValidationErrorsMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {
    $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
    unset($_SESSION['errors']);

    $response = $next($request, $response);
    return $response;
  }
}
