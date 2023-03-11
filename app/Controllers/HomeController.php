<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Config;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HomeController extends Controller
{

  protected $view;

  /**
   * @param $container
   */
  public function __construct($container) 
  {
    parent::__construct($container);
    $this->resume = getenv('URL') . getenv('RESUME_PATH');
    $this->github = getenv('GITHUB_URL');
    $this->view = $container->get('view');
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function index(Request $request, Response $response)
  {
    return $this->container->get('view')->render($response, 'home/home.twig', [
      'test' => 'test'
    ]);
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function people(Request $request, Response $response)
  {
    return $this->container->get('view')->render($response, 'home/people.twig');
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function gallery(Request $request, Response $response)
  {
    return $this->container->get('view')->render($response, 'home/gallery.twig');
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function github(Request $request, Response $response)
  {
    header("Location: " . $this->github);
    die();
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function resume(Request $request, Response $response)
  {
    header("Location: " . $this->resume);
    die();
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function publickey(Request $request, Response $response)
  {
    header('Content-Type: text/plain');
    echo file_get_contents('./pgp/public.pem');
    die();
  }

  /**
   * @param Request $request
   * @param Request $response
   */
  public function consulting(Request $request, Response $response)
  {
    return $this->container->get('view')->render($response, 'home/consulting.twig');
  }

  /**
   * Render the blog page
   * 
   * @param Request $request
   * @param Request $response
   */
  public function blog(Request $request, Response $response)
  {
    if(!Config::blogMode()) {
      return $this->view->render($response, 'home/unavailable.twig');
    }

    echo file_get_contents("html/blog/blog.html");

    return $response;
  }
}