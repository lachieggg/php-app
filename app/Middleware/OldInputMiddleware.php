<?php

namespace LoginApp\Middleware;

class OldInputMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {
    $this->container->view->getEnvironment()->addGlobal('old_input', $_SESSION['old_input']);
    $_SESSION['old_input'] = $request->getParams();
    return $next($request, $response);
  }
}
