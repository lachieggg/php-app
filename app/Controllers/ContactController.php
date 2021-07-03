<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\Controller;
use LoginApp\Models\Comment;
use Ramsey\Uuid\Uuid;

class ContactController extends Controller
{
  public function contact($request, $response)
  {
    return $this->view->render($response, 'contact.twig');

    if($this->auth->isVerified()) {
      return $this->view->render($response, 'contact.twig');
    } else {
      return $this->view->render($response, 'auth/unauthorized/general-unauthorized.twig');
    }
  }

  public function getContactPosts($request, $response) {
    // must be verified....
    if($this->auth->isAdmin()) {
      $posts = Comment::select('user_comments.uuid', 'user_comments.comment_text', 'user_comments.created_at')
        ->orderBy('created_at', 'DESC')
        ->get(['user_comments.*', 'users.*']);

      return $response->withJson($posts);
    } else {
      // no...
      $c = new \Illuminate\Database\Eloquent\Collection;
      return $response->withJson($c);
    }
  }

  public function submitContactPost($request, $response)
  {
    // XSS protection 
    $comment = str_replace('>', '', $request->getParam('comment'));
    $comment = str_replace('<', '', $comment);
    $mobile = str_replace('>', '', $request->getParam('mobile'));
    $mobile = str_replace('<', '', $comment);
    $name = str_replace('>', '', $request->getParam('email'));
    $name = str_replace('<', '', $comment);

    // do check for SQL injections
    // sum
    $tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $text = $tab . "name: " . $name
    . "<br>" . $tab . "comment: " . $comment
    . "<br>" . $tab . "mobile: " . $mobile
    . "<br>" . $tab . "email: " . $email;

    $comment = Comment::create([
      'uuid' => Uuid::uuid4(),
      'user_uuid' => $this->auth->user->uuid,
      'comment_text' => $text
    ]);

    return $response->withRedirect($this->router->pathFor('contact'));
  }


  public function deleteContactPost($request, $response)
  {
    if($this->auth->isAdmin()) {
      // okay...
      $uuid = $request->getParam('uuid');
      $comment = Comment::where('uuid', $uuid)->first();
      $comment->delete();

      return $response->withRedirect($this->router->pathFor('contact'));

    } else {
      // no...
    }
  }

}
