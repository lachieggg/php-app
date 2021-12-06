<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\BlogController;

class HomeController extends Controller
{

  public function __construct($container) 
  {
    parent::__construct($container);
    $this->privacy_mode = False;
  }

  public function index($request, $response)
  {
    return $this->view->render($response, 'home/home.twig');
  }

  public function thinkers($request, $response)
  {
    return $this->view->render($response, 'home/thinkers.twig');
  }

  public function gallery($request, $response)
  {
    return $this->privacy_mode ? $this->view->render($response, 'home/gallery.twig') : $this->view->render($response, 'home/home.twig');
  }

  public function github($request, $response)
  {
    header("Location: https://github.com/lachieggg");
    die();
  }

  public function forum($request, $response)
  {
    return $this->view->render($response, 'auth/private.twig');
  }

}
