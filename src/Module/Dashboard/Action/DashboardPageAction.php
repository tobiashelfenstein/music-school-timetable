<?php

namespace App\Module\Dashboard\Action;

use PDO;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

final class DashboardPageAction {

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        //$sql_get_all_units = "SELECT * FROM units ORDER BY begin ASC";
        //$result = $this->pdo->query($sql_get_all_units);;

        //var_dump($result->fetchAll());

        return $renderer->render($response, 'dashboard/dashboard.html.php');
    }
}