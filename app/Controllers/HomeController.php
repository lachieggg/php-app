<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{
  var $privacy_mode = True;
  var $privacy_mode_strict = True;

  public function index($request, $response)
  {
    // TODO privacy mode
    return $this->view->render($response, 'views/home/home.twig');
  }

  public function blog($request, $response)
  {
    if($this->privacy_mode_strict) {
      return $this->view->render($response, 'views/home/private.twig');
    }
    return $this->view->render($response, 'views/home/blog.twig');
  }

  public function readings($request, $response)
  {
    if($this->privacy_mode) {
     return $this->view->render($response, 'views/home/private.twig');
    }
    return $this->view->render($response, 'views/home/readings.twig');
  }

  public function forum($request, $response)
  {
    return $this->view->render($response, 'views/home/private.twig');


    // logged in?
    if(!$this->auth->user()) {
      return $this->view->render($response, 'views/auth/unauthorized/general-unauthorized.twig');
    }
    // deleted?
    if($this->auth->isDeleted()) {
      return $this->view->render($response, 'views/auth/unauthorized/general-unauthorized.twig');
    }
    // approved?
    if(!$this->auth->isApproved()) {
      return $this->view->render($response, 'views/auth/unauthorized/general-unauthorized.twig');
    }
    // welcome
    return $this->view->render($response, 'views/home/forum.twig');
  }

  public function about($request, $response)
  {
    return $this->view->render($response, 'views/home/private.twig');

    return $this->view->render($response, 'views/home/about.twig');
  }

  public function github($request, $response)
  {
    return $this->view->render($response, 'views/home/private.twig');

    header("Location: https://github.com/lachieggg");
    die();
  }
}
