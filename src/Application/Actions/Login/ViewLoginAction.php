<?php

namespace App\Application\Actions\Login;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

final class ViewLoginAction {

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'login/login.html.php');
    }
}