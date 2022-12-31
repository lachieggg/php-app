<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Config;
use Slim\Http\Response;
use Slim\Psr7\Request;
use Slim\Psr7\Response as Psr7Response;

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
   * @param $request
   * @param $response
   */
  public function index($request, $response)
  {
    return $this->container->get('view')->render($response, 'home/home.twig', [
      // 'router' => $this->container->get('router'),
      // 'app' => $this->container,
      'test' => 'test'
    ]);
  }

  /**
   * @param $request
   * @param $response
   */
  public function people($request, $response)
  {
    return $this->container->get('view')->render($response, 'home/people.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function gallery($request, $response)
  {
    return $this->container->get('view')->render($response, 'home/gallery.twig');
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
  public function consulting($request, $response)
  {
    return $this->container->get('view')->render($response, 'home/consulting.twig');
  }

  /**
   * Render the blog page
   * 
   * @param $request
   * @param $response
   */
  public function blog(Request $request, Psr7Response $response)
  {
    if(!Config::blogMode()) {
      return $this->view->render($response, 'home/unavailable.twig');
    }

    echo file_get_contents("html/blog/blog.html");
    $response->getBody()->write(" ");
    $response->withStatus(200);

    // Convert the Slim response to a PSR-7 response and return it
    // return $response->toPsrResponse();
    return $response;
  }
}
