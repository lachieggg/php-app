<?php

use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;

/**
 * makeContainer
 * 
 * @param $settings
 * @param $capsule
 * 
 * @return Container
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
