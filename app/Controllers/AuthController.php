<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;
use LoginApp\Models\User;
use Slim\Views\Twig as View;
use Ramsey\Uuid\Uuid;
use Respect\Validation\Validator as v;
use Illuminate\Support\Arr;

class AuthController extends Controller
{

  protected $view;

  /**
   * @param $container
   */
  public function __construct($container) 
  {
    parent::__construct($container);
    $this->view = $this->container->get('view');
  }

  /**
   * @param $request
   * @param $response
   */
  public function getSignIn($request, $response)
  {
    return isset($_SESSION['user']) ? $this->view>render($response, 'home/home.twig') : $this->view->render($response, 'auth/sign-in.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function postSignIn($request, $response)
  {
    if(isset($_SESSION['user'])) {
      return $response->withRedirect($this->router->pathFor('home'));
    }

    $email = htmlspecialchars($request->getParam('email'));
    $password = htmlspecialchars($request->getParam('password'));

    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty(),
      'password' => v::noWhitespace()->notEmpty()->loginAttempt(),
    ]);

    if($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.sign-in'));
    }

    $auth = $this->auth->attempt(
      $email,
      $password
    );

    return $auth ? $response->withRedirect($this->router->pathFor('home')) : $response->withRedirect($this->router->pathFor('auth.sign-in'));
  }

  /**
   * @param $request
   * @param $response
   */
  public function postSignUp($request, $response)
  {
    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
      'name' => v::notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty()->length(8, 128)->passwordConfirmation(),
      'confirmation' => v::noWhitespace()->notEmpty()->length(8, 128)->passwordConfirmation()
    ]);

    $email = htmlspecialchars($request->getParam('email'));
    $name = htmlspecialchars($request->getParam('name'));

    if($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.sign-up'));
    }

    $user = User::create([
      'uuid' => Uuid::uuid4(),
      'email' => $email,
      'name' => $name,
      'password' =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT),
    ]);

    $this->auth->attempt($email, $request->getParam('password'));

    return $response->withRedirect($this->router->pathFor('home'));
  }

  /**
   * @param $request
   * @param $response
   */
  public function getSignUp($request, $response)
  {
    return $this->view->render($response, 'auth/sign-up.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function getSignOut($request, $response)
  {
    $this->auth->logout();

    return $response->withRedirect($this->router->pathFor('home'));
  }

  /**
   * @param $request
   * @param $response
   */
  public function getBlogAdmin($request, $response)
  {
    return $this->auth->admin() ? $this->view->render($response, 'auth/admin/blog.twig') : $this->view->render($response, 'auth/private.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function getGalleryAdmin($request, $response)
  {
    return $this->auth->admin() ? $this->view->render($response, 'auth/admin/gallery.twig') : $this->view->render($response, 'auth/private.twig');
  }
}
