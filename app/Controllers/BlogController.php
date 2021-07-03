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
    return $this->view->render($response, 'private.twig');

    return $this->view->render($response, 'blog.twig');
  }

  public function getBlogPosts($request, $response)
  {
    $posts = BlogPost::where('is_private', 0)
      ->orderBy('created_at', 'DESC')
      ->get();

    return $response->withJson($posts);
  }

  public function submitBlogPost($request, $response)
  {
    // must be admin...
    if($this->auth->isAdmin()) {
      $url = $request->getParam('post');
      $title = $request->getParam('title');
      $type = $request->getParam('type');

      if($type == "Video") {
        $html = "<b>". $title . "</b> <br> <br>
							<video width='320' height='240' controls>
							<source src='" . $url . "' type='video/mp4'>
							</video>";
      } else {
        $html = "<b>". $title . " </b> <br> <br>
							<img src='" . $url . "'>";
      }

      $post = BlogPost::create([
        'uuid' => Uuid::uuid4(),
        'post_html' => $html,
        'is_private' => 0
      ]);

      return $response->withRedirect($this->router->pathFor('blog'));

    } else {
      // no...
      return $response->withRedirect($this->router->pathFor('blog'));

    }
  }

  public function deleteBlogPost($request, $response)
  {
    $uuid = $request->getParam('uuid');
    // must be admin...
    if($this->auth->isAdmin()) {
      $post = BlogPost::where('uuid', $uuid)->first();
      if(isset($post)){
        $post->is_private = 1;
        $post->save();
      }
    }
    return $response->withRedirect($this->router->pathFor('blog'));
  }

  public function getBlogAdmin($request, $response)
  {
    return $this->view->render($response, 'blog/admin.twig');
    // must be admin....
    if($this->auth->isAdmin()) {
      return $this->view->render($response, 'blog/blog.twig');
    } else {
      // no...
      return $this->view->render($response, 'auth/unauthorized/general-unauthorized.twig');
    }
  }
}
