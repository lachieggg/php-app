<?php

namespace LoginApp\Controllers;

use LoginApp\Controllers\Controller;

use Slim\Views\Twig as View;
use LoginApp\Models\User;
use Ramsey\Uuid\Uuid;
use Respect\Validation\Validator as v;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
  // GET sign in
  public function getSignIn($request, $response)
  {
    return isset($_SESSION['user']) ? $this->view->render($response, 'home/home.twig') : $this->view->render($response, 'auth/sign-in.twig');
  }

  // POST sign in
  public function postSignIn($request, $response)
  {
    if(isset($_SESSION['user'])) {
      return $response->withRedirect($this->router->pathFor('home'));
    }

    // XSS protection
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

  // GET sign up
  public function getSignUp($request, $response)
  {
    return $this->view->render($response, 'auth/sign-up.twig');
  }

  // POST sign up
  public function postSignUp($request, $response)
  {
    $validation = $this->validator->validate($request, [
      'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
      'name' => v::noWhitespace()->notEmpty()->alpha(),
      'password' => v::noWhitespace()->notEmpty()->passwordConfirmation(),
      'password_confirmation' => v::noWhitespace()->notEmpty()->passwordConfirmation()
    ]);

    if($validation->failed()) {
      return $response->withRedirect($this->router->pathFor('auth.sign-up'));
    }

    $user = User::create([
      'uuid' => Uuid::uuid4(),
      'email' => $request->getParam('email'),
      'name' => $request->getParam('name'),
      'password' =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT),
    ]);

    $this->auth->attempt($request->getParam('email'), $request->getParam('password'));

    return $response->withRedirect($this->router->pathFor('home'));
  }

  public function getSignOut($request, $response)
  {
    $this->auth->logout();

    return $response->withRedirect($this->router->pathFor('home'));
  }

  public function userName($request, $response)
  {
    $user = $this->auth->user();
    return $user->first_name . ' ' . $user->last_name;
  }

  public function getBlogAdmin($request, $response)
  {
    return $this->auth->isAdmin() ? $this->view->render($response, 'auth/admin/blog.twig') : $this->view->render($response, 'auth/private.twig');
  }

  public function getGalleryAdmin($request, $response)
  {
    return $this->auth->isAdmin() ? $this->view->render($response, 'auth/admin/gallery.twig') : $this->view->render($response, 'auth/private.twig');
  }

}
