<?php

// Include the routes.php file
require_once __DIR__ . '/../app/routes.php';

use LoginApp\Auth\Auth;
use LoginApp\Config;
use LoginApp\Validation\Validator;
use LoginApp\Controllers\HomeController;
use LoginApp\Controllers\AuthController;
use LoginApp\Controllers\ContactController;
use LoginApp\Middleware\OldInputMiddleware;
use LoginApp\Middleware\CsrfViewMiddleware;
use LoginApp\Middleware\ValidationErrorsMiddleware;
use LoginApp\Middleware\LoggerMiddleware;
use Illuminate\Database\Capsule\Manager;
use Respect\Validation\Validator as RespectValidation;
use Slim\Csrf\Guard;
use Slim\Views\Twig;
use Slim\App;
use Dotenv\Dotenv;
use Projek\Slim\MonologProvider;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Factory\AppFactory;
use Psr\Container\ContainerInterface;
use DI\Container;
use Monolog\Logger;
use Slim\Routing\Router;
use Slim\Csrf\GuardMiddleware;
use LoginApp\Middleware\CsrfMiddleware;
use DI\ContainerBuilder;
use Twig\Loader\FilesystemLoader;
use Slim\Views\TwigMiddleware;
use Slim\Views\View;
use Slim\Psr7\Factory\ServerRequestFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\ServerRequestCreatorFactory;

use function LoginApp\Routes\defineRoutes;

// Start new session
session_start();

// Autoload dependencies
require __DIR__ . '/../vendor/autoload.php';

// Fetch database settings
$host = getenv('POSTGRES_HOST');
$username = getenv('POSTGRES_USER');
$database = getenv('POSTGRES_DB');
$password = getenv('POSTGRES_PASSWORD');
$driver = 'pgsql';

// Set up the settings for the container
$settings = [
    'twig' => [
        'cache_path' => './twig-cache',
        'debug' => true,
        'auto_reload' => true,
        'template_path' => __DIR__ . '/../resources/views'
    ],
    'db' => [
        'driver' => $driver,
        'host' => $host,
        'database' => $database,
        'username' => $username,
        'password' => $password,
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ],
    'displayErrorDetails' => true,
    'debug' => false,
];


$responseFactory = new ResponseFactory();
$containerBuilder = new ContainerBuilder();

// Add the settings to the container
$containerBuilder->addDefinitions([
    'settings' => $settings,
    'request'  => function () {
        $serverRequestCreator = ServerRequestCreatorFactory::create();
        return $serverRequestCreator->createServerRequestFromGlobals();
    },
]);

$container = $containerBuilder->build();

AppFactory::setContainer($container);

$app = AppFactory::create();
$app->add(new CsrfMiddleware());

defineRoutes($app);


// Fetch the Slim Container
$container = $app->getContainer();

$router = $app->getRouteCollector()->getRouteParser();

$container->set('router', $router);

// Overrides the default Slim Error handler
// and adds a custom handler
$container->set('errorHandler', function ($container) {
    return function ($request, $response, $exception) use ($container) {
        $container->get('logger')->error($exception->getTraceAsString());
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
});


$app->addErrorMiddleware(true, true, true);
// $errorMiddleware = $app->getMiddlewareCollection()->getErrorMiddleware();
// $errorHandler = $errorMiddleware->getDefaultErrorHandler();
// $errorHandler->registerErrorRenderer('text/html', \Slim\Views\TwigErrorRenderer::class);

// Configure Eloquent
$capsule = new Manager;
$capsule->addConnection($settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Set container parameters
setDotEnv($container);
setAuth($container);
setDatabase($container, $capsule);
setValidator($container);
setControllers($container);
setView($container, $app);
setLogger($container);


$config = new Config($container);

$app->add(new ValidationErrorsMiddleware($container));
$app->addMiddleware(new OldInputMiddleware($container));

// Add Routing Middleware
$app->addRoutingMiddleware();

$app->add(new CsrfMiddleware());

$app->addMiddleware(new LoggerMiddleware($container));

RespectValidation::with('\\LoginApp\\Validation\\Rules\\');


/**
 * @param $container
 */
function setControllers($container) {
    $container->set('HomeController', function ($container) {
        return new HomeController($container);
    });
    $container->set('AuthController', function ($container) {
        return new AuthController($container);
    });
    $container->set('ContactController', function ($container) {
        return new ContactController($container);
    });
}

/**
 * @param $container
 */
function setDotEnv($container) {
    $container->set('dotenv', function ($container) {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();
        return $dotenv;
    });
}

/**
 * @param $container
 */
function setDatabase($container, $capsule) {
    $container->set('db', function ($container) use ($capsule) {
        return $capsule;
    });
}

/**
 * @param $container
 */
function setAuth($container) {
    $container->set('auth', function ($container) {
        return new Auth($container);
    });    
}

/**
 * @param $container
 */
function setView($container, $app) {

    // Set up Twig
    $container->set('view', function ($container, $app) {
        $settings = $container->get('settings')['twig'];
        $view = new Twig(new FilesystemLoader($settings['template_path']), [
            'cache' => $settings['cache_path'],
        ]);

        return $view;
    });

    // Add Twig Middleware
    $app->add(TwigMiddleware::createFromContainer($app, 'view'));
}


/**
 * @param $container
 */
function setValidator($container) {
    $container->set('validator', function ($container) {
       return new Validator;
    });
}

/**
 * @param $container
 */
function setLogger($container) {
    $container->set('logger', function (ContainerInterface $container) {
        $settings = [
            // Path to log directory
            'directory' => __DIR__ . '/../logs/',
            // Log file name
            'filename' => 'login-app.log',
            // Your timezone
            'timezone' => 'Australia/Sydney',
            // Log level
            'level' => 'debug',
            // Handlers
            'handlers' => [],
        ];


        // Create a logger instance
        $logger = new Monolog\Logger($settings['filename']);

        // Set the log directory
        $logDirectory = $settings['directory'];

        // Check if the directory exists, if not create it
        if (!is_dir($logDirectory)) {
            mkdir($logDirectory, 0777, true);
        }

        // Create a stream handler to log to a file
        $stream = new Monolog\Handler\StreamHandler($logDirectory . $settings['filename'], $settings['level']);

        // Set the timezone for the logger
        $dateFormat = "Y-m-d H:i:s";
        $output = "%datetime% %channel%.%level_name%: %message% %context% %extra%\n";
        $formatter = new Monolog\Formatter\LineFormatter($output, $dateFormat);
        $stream->setFormatter($formatter);

        // Add the stream handler to the logger
        $logger->pushHandler($stream);

        // Return the logger instance
        return $logger;
    });
}