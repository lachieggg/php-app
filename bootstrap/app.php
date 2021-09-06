<?php

use Respect\Validation\Validator as v;

session_start();

use SlimCrf;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'db',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]
    ],
]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['auth'] = function ($container) {
  return new \LoginApp\Auth\Auth($container);
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', [
      'check' => $container->auth->check(),
      'user' => $container->auth->user(),
    ]);

    return $view;
};

$container['validator'] = function ($container) {
    return new LoginApp\Validation\Validator;
};

$container['HomeController'] = function ($container) {
    return new \LoginApp\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
    return new \LoginApp\Controllers\AuthController($container);
};

$container['ContactController'] = function ($container) {
    return new \LoginApp\Controllers\ContactController($container);
};

$container['BlogController'] = function ($container) {
    return new \LoginApp\Controllers\BlogController($container);
};

$container['ForumController'] = function ($container) {
    return new \LoginApp\Controllers\ForumController($container);
};

$container['csrf'] = function ($container) {
  $csrf = new \Slim\Csrf\Guard();
  $csrf->setPersistentTokenMode(true);
  return $csrf;
};

$app->add(new \LoginApp\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \LoginApp\Middleware\OldInputMiddleware($container));
$app->add(new \LoginApp\Middleware\CsrfViewMiddleware($container));


// CSRF protection for Slim 3
$app->add($container->csrf);


require __DIR__ . '/../app/routes.php';