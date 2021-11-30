<?php

namespace LoginApp\Controllers;

use Slim\Views\Twig as View;
use LoginApp\Controllers\Controller;
use LoginApp\Models\BlogPost;
use Ramsey\Uuid\Uuid;

class BlogController extends Controller
{
  public function blog($request, $response)
  {
    if($this->privacy_mode) {
      return $this->view->render($response, 'auth/private.twig');
    }

    if($this->auth->isAdmin()) {
      return $this->view->render($response, 'home/blog.twig');
    }

    return $this->view->render($response, 'home/private.twig');
  }

  public function getBlogPosts($request, $response)
  {
    if($this->privacy_mode) {
      return;
    }

    $posts = BlogPost::where('is_private', 0)
      ->orderBy('created_at', 'DESC')
      ->get();

    return $response->withJson($posts);
  }

  public function getVideoRenderHtml($type, $title, $url)
  {
    if($type == "Video") {
      $html = "<b>". $title . "</b> <br> <br>
            <video width='320' height='240' controls>
            <source src='" . $url . "' type='video/mp4'>
            </video>";
    } else {
      $html = "<b>". $title . " </b> <br> <br>
            <img src='" . $url . "'>";
    }

    return $html;
  }

  public function submitBlogPost($request, $response)
  {
    if($this->auth->isAdmin()) {
      $type = $request->getParam('type');
      $title = $request->getParam('title');
      $url = $request->getParam('post');

      $html = getVideoRenderHtml($type, $title, $url);

      $post = BlogPost::create([
        'uuid' => Uuid::uuid4(),
        'post_html' => $html,
        'is_private' => 0
      ]);

    }
    return $response->withRedirect($this->router->pathFor('blog.posts'));
  }

  public function deleteBlogPost($request, $response)
  {
    $uuid = $request->getParam('uuid');

    if($this->auth->isAdmin()) {
      $post = BlogPost::where('uuid', $uuid)->first();

      if(isset($post)){
        $post->is_private = 1;
        $post->save();
      }
    }
    return $response->withRedirect($this->router->pathFor('blog.posts'));
  }

  public function getBlogAdmin($request, $response)
  {
    if($this->auth->isAdmin()) {
      return $this->view->render($response, 'home/blog.twig');
    }
    // not authorized
    return $this->view->render($response, 'auth/private.twig');
  }
}
