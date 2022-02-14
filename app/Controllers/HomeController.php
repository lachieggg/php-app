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
    $this->privacy_mode = False;
    $this->resume = getenv('S3_URL') . getenv('RESUME_PATH');
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
   * Render the test page
   * 
   * @param $request
   * @param $response
   */
  public function test($request, $response)
  {
    if(Config::testMode()) {
      return $this->view->render($response, 'home/test.twig');
    }
    
    return $this->view->render($response, 'home/home.twig');
  }
  
  /**
   * Render the weird page
   * 
   * @param $request
   * @param $response
   */
  public function blog($request, $response)
  {
    echo file_get_contents("html/blog/blog.html");
  }

}
