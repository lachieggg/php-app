<?php

namespace LoginApp\Middleware;

class UserAuthMiddleware extends Middleware {
  // The purpsoe of this class is to work out whether the user is authenticated
  // from the stand point of the navigation bars, so that only certain content menus
  // are shown depending on whether the user is authenticated.

  // The email of the user needs to be stored in the session somehow, and then we can
  // look them up using the AuthController:isAdmin() function...

  //TOOD
  public function __invoke($request, $response, $next) {
    // add the errors to the env so that twig can see them
    // $this->container['AuthController']->isAdmin();
    // $this->container->view->getEnvironment()->addGlobal('administrator', $_SESSION['administrator']);
    // unset($_SESSION['errors']);
    //
    // $response = $next($request, $response);
    // return $response;
  }
}
