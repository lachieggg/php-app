<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\Controller;
use LoginApp\Models\Comment;
use Ramsey\Uuid\Uuid;

class ForumController extends Controller
{
  /**
   * @param $request
   * @param $response
   */
  public function getForumPosts($request, $response) {
    $posts = Comment::select('user_comments.comment_text', 'user_comments.created_at', 'users.name')
      ->leftJoin('users', 'user_comments.user_uuid', '=', 'users.uuid')
      ->orderBy('created_at', 'DESC')
      ->get(['user_comments.*', 'users.*']);

    return $response->withJson($posts);
  }

  /**
   * @param $request
   * @param $response
   */
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

  /**
   * @param $request
   * @param $response
   */
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
