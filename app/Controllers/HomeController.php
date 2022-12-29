<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\BlogController;
use LoginApp\Config;

class HomeController extends Controller
{
  /**
   * @param $container
   */
  public function __construct($container) 
  {
    parent::__construct($container);
    $this->resume = getenv('URL') . getenv('RESUME_PATH');
    $this->github = getenv('GITHUB_URL');
  }

  /**
   * @param $request
   * @param $response
   */
  public function index($request, $response)
  {
    return $this->view->render($response, 'home/home.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function people($request, $response)
  {
    return $this->view->render($response, 'home/people.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function gallery($request, $response)
  {
    return $this->view->render($response, 'home/gallery.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function github($request, $response)
  {
    header("Location: " . $this->github);
    die();
  }

  /**
   * @param $request
   * @param $response
   */
  public function resume($request, $response)
  {
    header("Location: " . $this->resume);
    die();
  }

  /**
   * @param $request
   * @param $response
   */
  public function publickey($request, $response)
  {
    header('Content-Type: text/plain');
    echo file_get_contents('./pgp/public.pem');
    die();
  }

  /**
   * @param $request
   * @param $response
   */
  public function forum($request, $response)
  {
    return $this->view->render($response, 'auth/private.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function consulting($request, $response)
  {
    return $this->view->render($response, 'home/consulting.twig');
  }

  /**
   * Render the blog page
   * 
   * @param $request
   * @param $response
   */
  public function blog($request, $response)
  {
    if(!Config::blogMode()) {
      return $this->view->render($response, 'home/unavailable.twig');
    }

    echo file_get_contents("html/blog/blog.html");
  }
}
