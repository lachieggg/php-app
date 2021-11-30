<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\BlogController;

class HomeController extends Controller
{
  public function index($request, $response)
  {
    return $this->view->render($response, 'home/home.twig');
  }

  public function forum($request, $response)
  {
    if($this->privacy_mode) {
      return $this->view->render($response, 'auth/private.twig');
    }
    if(!$this->auth->user()) {
      return $this->view->render($response, 'auth/unauthorized.twig');
    }
    if($this->auth->isDeleted()) {
      return $this->view->render($response, 'auth/unauthorized.twig');
    }
    if(!$this->auth->isApproved()) {
      return $this->view->render($response, 'auth/unauthorized.twig');
    }

    return $this->view->render($response, 'home/forum.twig');
  }

  public function thinkers($request, $response)
  {
    return $this->view->render($response, 'home/thinkers.twig');
  }


  public function github($request, $response)
  {
    header("Location: https://github.com/lachieggg");
    die();
  }

}
