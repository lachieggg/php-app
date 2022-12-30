<?php

namespace LoginApp\Routes;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

function defineRoutes(RouteCollectorProxy $group)
{
    // Home
    $group->get('/', 'HomeController:index')->setName('home.root');
    $group->get('/home', 'HomeController:index')->setName('home');
    $group->get('/github', 'HomeController:github')->setName('home.github');
    $group->get('/people', 'HomeController:people')->setName('home.people');
    $group->get('/resume', 'HomeController:resume')->setName('home.resume');
    $group->get('/blog', 'HomeController:blog')->setname('home.blog');
    $group->get('/contact', 'ContactController:contact')->setName('contact');
    $group->get('/consulting', 'HomeController:consulting')->setName('home.consulting');
    $group->get('/pgp/public', 'HomeController:publickey')->setName('home.pgp.public');

    // Auth
    $group->post('/sign-up', 'AuthController:postSignUp')->setName('auth.sign-up');
    $group->post('/sign-in', 'AuthController:postSignIn')->setName('auth.sign-in');
    $group->get('/sign-up', 'AuthController:getSignUp')->setName('auth.sign-up');
    $group->get('/sign-in', 'AuthController:getSignIn')->setName('auth.sign-in');
    $group->get('/email-exists', 'AuthController:getEmailExists')->setName('auth.email-exists');
    $group->get('/change-password', 'AuthController:changePassword')->setName('auth.password.change');
    $group->get('/sign-out', 'AuthController:getSignOut')->setName('auth.sign-out');
}