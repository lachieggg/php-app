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
    if($this->privacy_mode) {
      return $this->view->render($response, 'auth/private.twig');
    }

    if($this->auth->isVerified()) {
      return $this->view->render($response, 'home/forum.twig');
    }

    return $this->view->render($response, 'auth/unauthorized.twig');
  }

  public function getForumPosts($request, $response) {

    $posts = Comment::select('user_comments.comment_text', 'user_comments.created_at', 'users.name')
      ->leftJoin('users', 'user_comments.user_uuid', '=', 'users.uuid')
      ->orderBy('created_at', 'DESC')
      ->get(['user_comments.*', 'users.*']);

    return $response->withJson($posts);
  }

  public function submitForumPost($request, $response)
  {
    // XSS protection
    $comment = htmlspecialchars($request->getParam('comment'));
    $mobile = htmlspecialchars($request->getParam('mobile'));
    $name = htmlspecialchars($request->getParam('email'));

    if($this->auth->isVerified()) {
      $username = $this->auth->user->full_name;

      $post = Comment::create([
        'uuid' => Uuid::uuid4(),
        'comment_text' => $comment,
        'user_name' => $username
      ]);
    }
    return $response->withRedirect($this->router->pathFor('forum'));
  }

  public function getForumPanel($request, $response)
  {
    if($this->auth->isVerified()) {
      return $this->view->render($response, 'forum/forum.twig');
    }

    return $this->view->render($response, 'auth/unauthorized.twig');
  }

  public function submitComment($request, $response)
  {
    if($this->auth->isVerified()) {
      $comment = $request->getParam('comment');

      $comment = Comment::create([
        'uuid' => Uuid::uuid4(),
        'user_uuid' => $this->auth->user->uuid,
        'comment_text' => $comment
      ]);

      return $response->withRedirect($this->router->pathFor('forum'));
    }
  }
}
