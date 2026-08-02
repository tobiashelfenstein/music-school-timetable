<?php

use DI\ContainerBuilder;
use Slim\App;

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\MySQLUserRepository;
use App\Domain\Timetable\TimetableRepository;
use App\Infrastructure\Persistence\Timetable\MySQLTimetableRepository;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

$containerBuilder->addDefinitions([
    UserRepository::class => \DI\autowire(MySQLUserRepository::class),
]);

$containerBuilder->addDefinitions([
    TimetableRepository::class => \DI\autowire(MySQLTimetableRepository::class),
]);

$container = $containerBuilder->build();
//$container = $containerBuilder->addDefinitions(__DIR__ . '/container.php')->build();

return $container->get(App::class);