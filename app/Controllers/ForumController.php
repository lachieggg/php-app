<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\Controller;
use LoginApp\Models\Comment;
use Ramsey\Uuid\Uuid;

class ForumController extends Controller
{
  public function forum($request, $response)
  {

    return $this->view->render($response, 'views/home/private.twig');


    if($this->auth->isVerified()) {
      return $this->view->render($response, 'views/home/forum.twig');
    } else {
      return $this->view->render($response, 'views/auth/unauthorized/general-unauthorized.twig');
    }
  }


  public function getForumPosts($request, $response) {

    $posts = Comment::select('user_comments.comment_text', 'user_comments.created_at', 'users.full_name')
      ->leftJoin('users', 'user_comments.user_uuid', '=', 'users.uuid')
      ->orderBy('created_at', 'DESC')
      ->get(['user_comments.*', 'users.*']);

    return $response->withJson($posts);
  }

  public function submitForumPost($request, $response)
  {
    // XSS protection
    $comment = str_replace('>', '', $request->getParam('comment'));
    $comment = str_replace('<', '', $comment);
    $mobile = str_replace('>', '', $request->getParam('mobile'));
    $mobile = str_replace('<', '', $comment);
    $name = str_replace('>', '', $request->getParam('email'));
    $name = str_replace('<', '', $comment);

    // must be admin....
    if($this->auth->isVerified()) {
      $post = $request->getParam('comment');
      // okay...
      $username = $this->auth->user->full_name;


      $post = Comment::create([
        'uuid' => Uuid::uuid4(),
        'comment_text' => $post,
        'user_name' => $username
      ]);
    }
    return $response->withRedirect($this->router->pathFor('forum'));
  }

  public function getForumPanel($request, $response)
  {
    // must be verified....
    if($this->auth->isVerified()) {
      return $this->view->render($response, 'forum/forum.twig');
    } else {
      // no...
      return $this->view->render($response, 'views/auth/unauthorized/general-unauthorized.twig');
    }
  }

  public function submitComment($request, $response)
  {
    if($this->auth->isVerified()) {
      $comment = $request->getParam('comment');
      // okay...

      $comment = Comment::create([
        'uuid' => Uuid::uuid4(),
        'user_uuid' => $this->auth->user->uuid,
        'comment_text' => $comment
      ]);

      return $response->withRedirect($this->router->pathFor('forum'));

    } else {
      // no...

    }
  }
}
