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

    return $this->view->render($response, 'home.twig');
  }

  public function blog($request, $response)
  {
    if($this->privacy_mode_strict) {
      return $this->view->render($response, 'private.twig');
    }
    return $this->view->render($response, 'blog.twig');
  }

  public function readings($request, $response)
  {
    if($this->privacy_mode) {
     return $this->view->render($response, 'private.twig');
    }
    return $this->view->render($response, 'readings.twig');
  }

  public function forum($request, $response)
  {
    return $this->view->render($response, 'private.twig');


    // logged in?
    if(!$this->auth->user()) {
      return $this->view->render($response, 'auth/unauthorized/general-unauthorized.twig');
    }
    // deleted?
    if($this->auth->isDeleted()) {
      return $this->view->render($response, 'auth/unauthorized/general-unauthorized.twig');
    }
    // approved?
    if(!$this->auth->isApproved()) {
      return $this->view->render($response, 'auth/unauthorized/general-unauthorized.twig');
    }
    // welcome
    return $this->view->render($response, 'forum.twig');
  }

  public function about($request, $response)
  {
    return $this->view->render($response, 'private.twig');

    return $this->view->render($response, 'about.twig');
  }

  public function github($request, $response)
  {
    return $this->view->render($response, 'private.twig');


    header("Location: https://github.com/lachieggg");
    die();
  }
}
