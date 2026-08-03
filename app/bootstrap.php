<?php

use DI\ContainerBuilder;
use Slim\App;

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\MySQLUserRepository;
use App\Domain\Unit\UnitRepository;
use App\Infrastructure\Persistence\Unit\MySQLUnitRepository;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

$containerBuilder->addDefinitions([
    UserRepository::class => \DI\autowire(MySQLUserRepository::class),
]);

$containerBuilder->addDefinitions([
    UnitRepository::class => \DI\autowire(MySQLUnitRepository::class),
]);

$container = $containerBuilder->build();
//$container = $containerBuilder->addDefinitions(__DIR__ . '/container.php')->build();

return $container->get(App::class);