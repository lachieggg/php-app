<?php

use LoginApp\Auth\Auth;
use LoginApp\Config;
use LoginApp\Validation\Validator;
use LoginApp\Controllers\HomeController;
use LoginApp\Controllers\AuthController;
use LoginApp\Controllers\ContactController;
use LoginApp\Controllers\BlogController;
use LoginApp\Controllers\ForumController;
use LoginApp\Middleware\OldInputMiddleware;
use LoginApp\Middleware\CsrfViewMiddleware;
use LoginApp\Middleware\ValidationErrorsMiddleware;
use Illuminate\Database\Capsule\Manager;
use Respect\Validation\Validator as RespectValidation;
use Slim\Csrf\Guard;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\App;
use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Start new session
session_start();

// Autoload dependencies
require __DIR__ . '/../vendor/autoload.php';

// Configure Slim Application settings
$settings = [
    'displayErrorDetails' => true
];

// Create the Slim Application
$app = new App(['settings' => $settings]);

// Set up the routes
require __DIR__ . '/../app/routes.php';

// Fetch database settings
$host = getenv('MYSQL_HOST');
$username = getenv('MYSQL_USER');
$driver = getenv('DATABASE_DRIVER');
$database = getenv('MYSQL_DATABASE');
$password = getenv('MYSQL_PASSWORD');


// Configure database settings
$db = [
    'driver' => $driver,
    'host' => $host,
    'database' => $database,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
];

// Fetch the Slim Container
$container = $app->getContainer();

// Configure Eloquent
$capsule = new Manager;
$capsule->addConnection($db);
$capsule->setAsGlobal();
$capsule->bootEloquent();


// Set container parameters
setDotEnv($container);
setAuth($container);
setView($container);
setCsrf($container);
setDatabase($container, $capsule);
setValidator($container);
setControllers($container);
setLogger($container);

$config = new Config($container);

$app->add(new ValidationErrorsMiddleware($container));
$app->add(new OldInputMiddleware($container));
$app->add(new CsrfViewMiddleware($container));

RespectValidation::with('\\LoginApp\\Validation\\Rules\\');

// CSRF protection for Slim 3
$app->add($container->csrf);

/**
 * @param $container
 */
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

/**
 * @param $container
 */
function setDotEnv($container) {
    $container['dotenv'] = function ($container) {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();
        return $dotenv;
    };
}

/**
 * @param $container
 */
function setDatabase($container, $capsule) {
    $container['db'] = function ($container) use ($capsule) {
        return $capsule;
    };
}

/**
 * @param $container
 */
function setAuth($container) {
    $container['auth'] = function ($container) {
        return new Auth($container);
    };
}

/**
 * @param $container
 */
function setView($container) {
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

        // Add env variables to twig environment
        $view->getEnvironment()->addGlobal('sliderMode', Config::sliderMode());
        $view->getEnvironment()->addGlobal('testMode', Config::testMode());
    
        return $view;
    };
}

/**
 * @param $container
 */
function setValidator($container) {
    $container['validator'] = function ($container) {
        return new Validator;
    };
}

/**
 * @param $container
 */
function setCsrf($container) {
    $container['csrf'] = function ($container) {
        $csrf = new Guard();
        $csrf->setPersistentTokenMode(true);
        return $csrf;
    };
}

/**
 * Logging
 * 
 * @param $container
 */
function setLogger($container) {
    $container['logger'] = function ($container) {
        $logger = new Monolog\Logger('app');
        $logger->pushHandler(new Monolog\Handler\StreamHandler('logs/app.log', Monolog\Logger::DEBUG));
        return $logger;
    };
}