<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;

use Slim\Views\Twig as View;
use LoginApp\Models\User;
use Ramsey\Uuid\Uuid;

use Respect\Validation\Validator as v;


class AuthController extends Controller
{
  // GET sign in
  public function getSignIn($request, $response)
  {
    return $this->view->render($response, 'views/auth/sign-in.twig');
  }

  // POST sign in
  public function postSignIn($request, $response)
  {
    $auth = $this->auth->attempt(
      $request->getParam('email'),
      $request->getParam('password')
    );

    if(!$auth) {
      return $response->withRedirect($this->router->pathFor('auth.signin'));
    }

    return $response->withRedirect($this->router->pathFor('home.home'));
  }

  // GET sign up
  public function getSignUp($request, $response)
  {
    return $this->view->render($response, 'views/auth/sign-up.twig');
  }

  // POST sign up
  public function postSignUp($request, $response)
  {
    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty(),
      'first_name' => v::noWhitespace()->notEmpty()->alpha(),
      'last_name' => v::noWhitespace()->notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty()
    ]);


    if(User::where('email', $request->getParam('email'))->exists()) {
      return $response->withRedirect($this->router->pathFor('auth.emailexists'));
    }

    if($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.signup'));
    }

    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');

    $user = User::create([
      'uuid' => Uuid::uuid4(),
      'email' => $request->getParam('email'),
      'first_name' => $first_name,
      'last_name' => $last_name,
      'full_name' => $first_name . ' ' . $last_name,
      'password' =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT),
    ]);

    $this->auth->attempt($request->getParam('email'), $request->getParam('password'));

    return $response->withRedirect($this->router->pathFor('home.home'));
  }

  // GET signed up
  public function getSignedUp($request, $response)
  {
    return $this->view->render($response, 'views/auth/signed-up.twig');
  }

  // GET signed up
  public function getEmailExists($request, $response)
  {
    return $this->view->render($response, 'views/auth/email-exists.twig');
  }

  public function getSignOut($request, $response)
  {
    $this->auth->logout();

    return $response->withRedirect($this->router->pathFor('home.home'));
  }

  public function userName($request, $response)
  {
    $user = $this->auth->user();
    return $user->first_name . ' ' . $user->last_name;
  }



}
