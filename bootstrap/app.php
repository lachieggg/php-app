<?php

use LoginApp\Auth\Auth;
use LoginApp\Config;
use LoginApp\Validation\Validator;
use LoginApp\Controllers\HomeController;
use LoginApp\Controllers\AuthController;
use LoginApp\Controllers\ContactController;
use LoginApp\Middleware\OldInputMiddleware;
use LoginApp\Middleware\ValidationErrorsMiddleware;
use LoginApp\Middleware\LoggerMiddleware;
use Illuminate\Database\Capsule\Manager;
use Respect\Validation\Validator as RespectValidation;
use Slim\Views\Twig;
use Twig\Environment;
use Slim\App;
use Projek\Slim\MonologProvider;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Factory\AppFactory;
use Psr\Container\ContainerInterface;
use DI\Container;
use Monolog\Logger;
use Slim\Routing\Router;
use DI\ContainerBuilder;
use Twig\Loader\FilesystemLoader;
use Slim\Views\TwigMiddleware;
use Slim\Views\View;
use Slim\Psr7\Factory\ServerRequestFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\ServerRequestCreatorFactory;
use Twig\Extension\DebugExtension;
use LoginApp\Logging\MonologExtension;
use Slim\Handlers\Strategies\RequestResponseArgs;

use function LoginApp\Routes\defineRoutes;
use function LoginApp\Routes\defineMaps;

// Start new session
session_start();

// Log
require __DIR__ . '/log.php';
require __DIR__ . '/container.php';
require __DIR__ . '/settings.php';
require __DIR__ . '/db.php';
require __DIR__ . '/view.php';
require __DIR__ . '/errors.php';
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/routes.php';

// Get application settings
$settings = getSettings();

// Configure Eloquent
$capsule = getCapsule($settings);

// Create container
$container = makeContainer($settings, $capsule);

// Create the app instance
AppFactory::setContainer($container);
$app = AppFactory::create();

// Define the router
$routeCollector = $app->getRouteCollector();
defineRoutes($routeCollector);
$routeCollector->setDefaultInvocationStrategy(new RequestResponseArgs());

// Set container parameters
$container->set('auth', new Auth($container));
$container->set('validator', new Validator());
$container->set('view', getView($container, $routeCollector));
$container->set('logger', getLogger());

// Controllers
$container->set('HomeController', new HomeController($container));
$container->set('AuthController', new AuthController($container));
$container->set('ContactController', new ContactController($container));

// Add Middleware
$app->add(new ValidationErrorsMiddleware($container));
$app->addMiddleware(new OldInputMiddleware($container));
$app->addMiddleware(new LoggerMiddleware($container));
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

RespectValidation::with('\\LoginApp\\Validation\\Rules\\');

setErrorHandlers($app, $container);
