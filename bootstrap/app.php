<?php

use LoginApp\Auth\Auth;
use LoginApp\Validation\Validator;
use LoginApp\Controllers\HomeController;
use LoginApp\Controllers\AuthController;
use LoginApp\Controllers\ContactController;
use LoginApp\Controllers\BlogController;
use LoginApp\Controllers\ForumController;
use LoginApp\Middleware\ValidationErrorsMiddleware;
use LoginApp\Middleware\OldInputMiddleware;
use LoginApp\Middleware\CsrfViewMiddleware;
use Respect\Validation\Validator as RespectValidation;
use Illuminate\Database\Capsule\Manager;
use Slim\App as App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$host = getenv('MYSQL_HOST');
$driver = getenv('DATABASE_DRIVER');
$username = getenv('MYSQL_USER');
$database = getenv('MYSQL_DATABASE');
$password = getenv('MYSQL_PASSWORD');

$app = new App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => $driver,
            'host' => $host,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]
    ],
]);

require __DIR__ . '/../app/routes.php';

$container = $app->getContainer();

$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['auth'] = function ($container) {
  return new Auth($container);
};

$container['view'] = function ($container) {
    $view = new Twig(__DIR__ . '/../resources/views');

    $view->addExtension(new TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', [
      'check' => $container->auth->check(),
      'user' => $container->auth->user(),
      'admin' => $container->auth->admin()
    ]);

    return $view;
};

$container['validator'] = function ($container) {
    return new Validator;
};

setControllers($container);

$container['csrf'] = function ($container) {
  $csrf = new \Slim\Csrf\Guard();
  $csrf->setPersistentTokenMode(true);
  return $csrf;
};

$app->add(new ValidationErrorsMiddleware($container));
$app->add(new OldInputMiddleware($container));
$app->add(new CsrfViewMiddleware($container));

RespectValidation::with('\\LoginApp\\Validation\\Rules\\');

// CSRF protection for Slim 3
$app->add($container->csrf);

function setControllers($container) {
    $container['HomeController'] = function ($container) {
        return new HomeController($container);
    };
    $container['AuthController'] = function ($container) {
        return new AuthController($container);
    };
    $container['ContactController'] = function ($container) {
        return new ContactController($container);
    };
    $container['BlogController'] = function ($container) {
        return new BlogController($container);
    };
    $container['ForumController'] = function ($container) {
        return new ForumController($container);
    };
}
