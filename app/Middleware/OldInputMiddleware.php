<?php

namespace LoginApp\Middleware;

class OldInputMiddleware extends Middleware {
  public function __invoke($request, $response, $next) {
    $this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
    $_SESSION['old'] = $request->getParams();
    //cycle through
    $response = $next($request, $response);
    return $response;
  }
}