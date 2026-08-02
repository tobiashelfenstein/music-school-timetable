<?php

namespace App\Application\Actions\Dashboard;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

final class ViewDashboardAction {

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'dashboard/dashboard.html.php');
    }
}