<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;
use LoginApp\Models\User;
use Slim\Views\Twig as View;
use Ramsey\Uuid\Uuid;
use Respect\Validation\Validator as v;
use Illuminate\Support\Arr;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
// use Slim\Http\Response;
// use Slim\Http\Request;
use LoginApp\Auth\Auth;

class AuthController extends Controller
{

  protected $view;
  protected $auth;

  /**
   * @param $container
   */
  public function __construct($container) 
  {
    parent::__construct($container);
    $this->view = $this->container->get('view');
    $this->auth = new Auth();
  }

  /**
   * @param Request $request
   * @param Response $response
   */
  public function getSignIn(Request $request, Response $response)
  {
    return isset($_SESSION['user']) ? $this->view->render($response, 'home/home.twig') : $this->view->render($response, 'auth/sign-in.twig');
  }

   /**
   * @param Request $request
   * @param Request $response
   */
  public function getSignUp(Request $request, Response $response)
  {
    return $this->view->render($response, 'auth/sign-up.twig');
  }

  /**
   * Handle a sign-in request.
   *
   * @param Request $request The request object
   * @param Response $response The response object
   */
  public function postSignIn(Request $request, Response $response)
  {
    // Check if the user is already logged in
    if(isset($_SESSION['user'])) {
      return $response->withHeader('Location', "/home");
    }

    // Get the request body parameters
    $params = $request->getParsedBody();
    // Access the email and password parameters
    $email = htmlspecialchars($params['email']);
    $password = htmlspecialchars($params['password']);

    // Validate the request
    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty(),
      'password' => v::noWhitespace()->notEmpty()->loginAttempt(),
    ]);

    // Redirect if validation fails
    if($validation->failed()) {
      return $response->withHeader('Location', "/sign-in");
    }

    // Attempt to log in the user
    $auth = $this->auth->attempt(
      $email,
      $password
    );

    // Redirect to the home page if login is successful, otherwise redirect back to the sign-in page
    return $auth ? $response->withHeader('Location', "/home") : $response->withHeader('Location', "/sign-in");
  }

  /**
   * Handle a sign-up request.
   *
   * @param Request $request The request object
   * @param Request $response The response object
   */
  public function postSignUp(Request $request, Response $response)
  {
    // Get the request body parameters
    $params = $request->getParsedBody();
    // Access the email and name parameters
    $email = htmlspecialchars($params['email']);
    $name = htmlspecialchars($params['name']);

    // Validate the request
    $validation = $this->container->get('validator')->validate($request, [
      'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
      'name' => v::notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty()->length(8, 128)->passwordConfirmation(),
      'confirmation' => v::noWhitespace()->notEmpty()->length(8, 128)->passwordConfirmation()
    ]);

    // Redirect if validation fails
    if($validation->failed()) {
      return $response->withHeader('Location', "/sign-up");
    }

    // Create a new user
    $user = User::create([
      'uuid' => Uuid::uuid4(),
      'email' => $email,
      'name' => $name,
      'password' =>  password_hash($params['password'], PASSWORD_DEFAULT),
    ]);

    $this->auth->attempt($email, $params['password']);

    return $response->withHeader('Location', "/home");
  }

 

  /**
   * @param Request $request
   * @param Request $response
   */
  public function getSignOut(Request $request, Response $response)
  {
    $this->auth->logout();

    return $response->withHeader('Location', "/home");
  }
}
