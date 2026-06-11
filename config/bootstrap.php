<?php

use DI\ContainerBuilder;
use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

$container = $containerBuilder->build();
//$container = $containerBuilder->addDefinitions(__DIR__ . '/container.php')->build();

return $container->get(App::class);