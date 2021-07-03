<?php

// main view
$app->get('/view', function ($request, $response) {
  return $this->view->render($response, 'home.twig');
});

// home routes
$app->get('/', 'HomeController:index')->setName('root');
$app->get('/home', 'HomeController:index')->setName('home');
$app->get('/blog', 'HomeController:blog')->setName('blog');
$app->get('/readings', 'HomeController:readings')->setName('readings');
$app->get('/github', 'HomeController:github')->setName('github');
$app->get('/about', 'HomeController:about')->setName('about');

// blog routes
$app->get('/blogPosts', 'BlogController:getBlogPosts')->setName('blogPosts');
$app->get('/blogAdmin', 'BlogController:getBlogAdmin')->setName('blogAdmin');
$app->post('/blogCreatePost', 'BlogController:submitBlogPost')->setName('submitBlogPost');
$app->post('/deletePost', 'BlogController:deleteBlogPost')->setName('deleteBlogPost');

// forum routes
$app->post('/forum/create', 'ForumController:submitForumPost')->setName('submitForumPost');
$app->get('/forum/posts', 'ForumController:getForumPosts')->setName('forumPosts');

// Forum
//$app->post('/submitComment', 'ForumController:submitComment')->setName('submitComment');
$app->get('/forum', 'ForumController:forum')->setName('forum');


// Auth
$app->post('/signup', 'AuthController:postSignUp')->setName('auth.signup');
$app->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/signin', 'AuthController:postSignIn')->setName('auth.signin');
$app->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->get('/emailexists', 'AuthController:getEmailExists')->setName('auth.emailexists');
$app->get('/changepassword', 'AuthController:changePassword')->setName('auth.password.change');
$app->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');

// Contact
$app->get('/contact', 'ContactController:contact')->setName('contact');
$app->post('/contact/message', 'ContactController:submitContactPost')->setName('submitContactPost');
$app->get('/contact/posts', 'ContactController:getContactPosts')->setName('contactPosts');
$app->post('/contact/post/delete', 'ContactController:deleteContactPost')->setName('deleteContactPost');
