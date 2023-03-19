<?php


/**
 * defineRoutes
 *
 * @param \Slim\Interfaces\RouteCollectorInterface $router The router to be used.
 */
function defineRoutes($router)
{
    // Home
    $router->map(['GET'], '/', 'HomeController:index')->setName('home.root');
    $router->map(['GET'], '/home', 'HomeController:index')->setName('home');
    $router->map(['GET'], '/github', 'HomeController:github')->setName('home.github');
    $router->map(['GET'], '/people', 'HomeController:people')->setName('home.people');
    $router->map(['GET'], '/resume', 'HomeController:resume')->setName('home.resume');
    $router->map(['GET'], '/blog', 'HomeController:blog')->setName('home.blog');
    $router->map(['GET'], '/contact', 'ContactController:contact')->setName('contact');
    $router->map(['GET'], '/consulting', 'HomeController:consulting')->setName('home.consulting');
    $router->map(['GET'], '/pgp/public', 'HomeController:publickey')->setName('home.pgp.public');
}
