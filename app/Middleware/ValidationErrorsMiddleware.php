<?php

namespace LoginApp\Middleware;

class ValidationErrorsMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {
    if(isset($_SESSION['errors'])) {
      $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
      unset($_SESSION['errors']);
    }
    return $next($request, $response);
  }
}
