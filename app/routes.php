<?php

// Home
$app->get('/', 'HomeController:index')->setName('home.root');
$app->get('/home', 'HomeController:index')->setName('home');
$app->get('/github', 'HomeController:github')->setName('home.github');
$app->get('/thinkers', 'HomeController:thinkers')->setName('home.thinkers');
$app->get('/gallery', 'HomeController:gallery')->setName('home.gallery');
$app->get('/resume', 'HomeController:resume')->setName('home.resume');
$app->get('/ssl/public', 'HomeController:publickey')->setName('home.ssl.public');

// Blog
$app->get('/blog', 'BlogController:blog')->setName('blog');
$app->get('/blog/posts', 'BlogController:getBlogPosts')->setName('blog.posts');
$app->post('/blog/create', 'BlogController:submitBlogPost')->setName('blog.create');
$app->post('/blog/delete', 'BlogController:deleteBlogPost')->setName('blog.remove');

// Forum
$app->post('/forum/post', 'ForumController:submitForumPost')->setName('forum.post.create');
$app->get('/forum/posts', 'ForumController:getForumPosts')->setName('forum.posts.get');

// Auth
$app->post('/sign-up', 'AuthController:postSignUp')->setName('auth.sign-up');
$app->get('/sign-up', 'AuthController:getSignUp')->setName('auth.sign-up');
$app->post('/sign-in', 'AuthController:postSignIn')->setName('auth.sign-in');
$app->get('/sign-in', 'AuthController:getSignIn')->setName('auth.sign-in');
$app->get('/email-exists', 'AuthController:getEmailExists')->setName('auth.email-exists');
$app->get('/change-password', 'AuthController:changePassword')->setName('auth.password.change');
$app->get('/sign-out', 'AuthController:getSignOut')->setName('auth.sign-out');

// Contact
$app->get('/contact', 'ContactController:email')->setName('contact');
$app->post('/contact/message', 'ContactController:submitContactPost')->setName('contact.post');
$app->get('/contact/posts', 'ContactController:getContactPosts')->setName('contact.posts');
$app->post('/contact/post/delete', 'ContactController:deleteContactPost')->setName('contact.posts.delete');

// Admin
$app->get('/blog/admin', 'AuthController:getBlogAdmin')->setName('blog.admin');
$app->get('/gallery/admin', 'AuthController:getGalleryAdmin')->setName('gallery.admin');
