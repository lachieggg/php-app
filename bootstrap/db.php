<?php

use Illuminate\Database\Capsule\Manager;

function getCapsule($settings)
{
    $db = $settings['db'];
    $capsule = new Manager();
    $capsule->addConnection($db);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
}
