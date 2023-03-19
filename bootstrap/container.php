<?php

use LoginApp\Controllers\HomeController;
use LoginApp\Controllers\AuthController;
use LoginApp\Controllers\ContactController;
use Psr\Container\ContainerInterface;
use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;

/**
 * makeContainer
 */
function makeContainer($settings, $capsule)
{
    $containerBuilder = new ContainerBuilder();

    // Add the settings to the container
    $containerBuilder->addDefinitions(
        [
        'settings' => $settings,
        'request'  => function () {
            $serverRequestCreator = ServerRequestCreatorFactory::create();
            return $serverRequestCreator->createServerRequestFromGlobals();
        },
        'response' => function () {
            return new \Slim\Psr7\Response();
        },
        ]
    );

    $container = $containerBuilder->build();

    // Dotenv
    $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
    $dotenv->load();
    $container->set('dotenv', $dotenv);

    // Database
    $container->set('db', $capsule);

    return $container;
}
