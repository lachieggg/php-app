<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Home
$app->get('/', 'HomeController:index')->setName('home.root');
$app->get('/home', 'HomeController:index')->setName('home');
$app->get('/github', 'HomeController:github')->setName('home.github');
$app->get('/people', 'HomeController:people')->setName('home.people');
$app->get('/resume', 'HomeController:resume')->setName('home.resume');
$app->get('/consulting', 'HomeController:consulting')->setName('home.consulting');
$app->get('/blog', 'HomeController:blog')->setname('home.blog');
$app->get('/contact', 'ContactController:contact')->setName('contact');
$app->get('/pgp/public', 'HomeController:publickey')->setName('home.pgp.public');

// Auth
$app->post('/sign-up', 'AuthController:postSignUp')->setName('auth.sign-up');
$app->get('/sign-up', 'AuthController:getSignUp')->setName('auth.sign-up');
$app->post('/sign-in', 'AuthController:postSignIn')->setName('auth.sign-in');
$app->get('/sign-in', 'AuthController:getSignIn')->setName('auth.sign-in');
$app->get('/email-exists', 'AuthController:getEmailExists')->setName('auth.email-exists');
$app->get('/change-password', 'AuthController:changePassword')->setName('auth.password.change');
$app->get('/sign-out', 'AuthController:getSignOut')->setName('auth.sign-out');