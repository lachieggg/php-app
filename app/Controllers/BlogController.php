<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\Controller;
use LoginApp\Models\BlogPost;
use Ramsey\Uuid\Uuid;

class BlogController extends Controller
{
  /**
   * @param $request
   * @param $response
   */
  public function blog($request, $response)
  {
    return $this->privacy_mode ? $this->view->render($response, 'auth/private.twig') : $this->view->render($response, 'blog/blog.twig');
  }

  /**
   * @param $request
   * @param $response
   */
  public function getBlogPosts($request, $response)
  {
    $posts = BlogPost::where([
      ['is_deleted', false],
      ['is_private', false]
    ])->orderBy('created_at', 'DESC')
      ->get();

    return $response->withJson($posts);
  }

 /**
   * @param $request
   * @param $response
   */
  public function submitBlogPost($request, $response)
  {
    if($this->auth->isAdmin()) {
      $type = $request->getParam('type');
      $title = $request->getParam('title');
      $content = $request->getParam('post');

      $post = BlogPost::create([
        'uuid' => Uuid::uuid4(),
        'type' => $type,
        'title' => $title,
        'content' => $content,
        'is_private' => 0
      ]);

    }
    return $response->withRedirect($this->router->pathFor('blog.posts'));
  }

 /**
   * @param $request
   * @param $response
   */
  public function deleteBlogPost($request, $response)
  {
    $uuid = $request->getParam('uuid');

    if($this->auth->isAdmin()) {
      $post = BlogPost::where('uuid', $uuid)->first();

      if(isset($post)){
        $post->is_deleted = 1;
        $post->save();
      }
    }
    return $response->withRedirect($this->router->pathFor('blog.posts'));
  }
}
