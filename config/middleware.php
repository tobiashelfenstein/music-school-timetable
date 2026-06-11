<?php

declare(strict_types=1);

use Slim\App;
use Slim\Routing\RouteContext;
use Psr\Http\Message\ResponseInterface;

use App\Application\Middleware\SessionMiddleware;

//use Slim\Exception\HttpNotFoundException;

return function (App $app) {

    // login
    $loggedInMiddleware = function($request, $handler): ResponseInterface {
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();

        if (empty($route)) {
            exit;
        }

        $routeName = $route->getName();

        $publicRoutesArray = array('home', 'login-page', 'login-submit');

        if (empty($_SESSION['user']) && (!in_array($routeName, $publicRoutesArray))) {
            $routeParser = $routeContext->getRouteParser();
            $url = $routeParser->urlFor('home');

            $response = new \Slim\Psr7\Response();

            return $response->withHeader('Location', $url)->withStatus(302);
        } else {
            $response = $handler->handle($request);

            return $response;
        }

    };
    
    $app->add($loggedInMiddleware);

    $app->add(SessionMiddleware::class);

    $app->addRoutingMiddleware();

};