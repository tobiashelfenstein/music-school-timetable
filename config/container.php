<?php

use Slim\App;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use App\Infrastructure\Settings\Settings;

return [
    // load application settings
    'settings' => function() {
        return require __DIR__ . '/settings.php';
    },

    // instance of the main app
    App::class => function(ContainerInterface $container) {
        $app = AppFactory::createFromContainer($container);

        // register routes
        (require __DIR__ . '/routes.php')($app);

        // register middlewares
        (require __DIR__ . '/middleware.php')($app);

        return $app;
    },

    // instance of the database connection
    /*Connection::class => function(ContainerInterface $container) {
        $settings = $container->get('settings')['db'];

        return new Connection($settings);
    },*/

    // instance of the database connection
    PDO::class => function(ContainerInterface $container) {
        $dsn = '';
        return new PDO($dsn, "", "");
    },

    // instance of the global app settings
    Settings::class => function(ContainerInterface $container) {
        return new Settings($container->get('settings'));
    }
];