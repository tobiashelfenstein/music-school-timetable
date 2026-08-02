<?php

namespace App\Application\Actions\Login;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Slim\Routing\RouteContext;
use App\Domain\User\UserRepository;


class SubmitLoginAction {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $loginParams = $request->getParsedBody();
        $username = $loginParams['username'];
        $password = $loginParams['password'];

        $loginData = $this->userRepository->getByLogin($username);

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