<?php

namespace App\Module\Login\Action;

use PDO;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

use App\Domain\User\User;

final class LoginPageAction {

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        //$sql_get_all_units = "SELECT * FROM units ORDER BY begin ASC";
        //$result = $this->pdo->query($sql_get_all_units);;

        //var_dump($result->fetchAll());

        return $renderer->render($response, 'login/login.html.php');
    }
}