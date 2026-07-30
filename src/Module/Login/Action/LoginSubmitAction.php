<?php

namespace App\Module\Login\Action;

use PDO;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

use App\Domain\User\User;
use Slim\Routing\RouteContext;

final class LoginSubmitAction {
    private $model;

    public function __construct(PDO $pdo) {
        $this->model = new User($pdo);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $loginParams = $request->getParsedBody();
        $username = $loginParams['username'];
        $password = $loginParams['password'];

        $loginData = $this->model->getByLogin($username);

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $redirectResponse = new \Slim\Psr7\Response();

        if ($loginData) {
            if ($loginData['password'] == $password) {
                $_SESSION['user'] = $loginData['id'];
                $url = $routeParser->urlFor('dashboard');

                return $redirectResponse->withHeader('Location', $url)->withStatus(302);
            }
        }

        unset($_SESSION['user']);

        $url = $routeParser->urlFor('home');

        return $redirectResponse->withHeader('Location', $url)->withStatus(302);
    }
}