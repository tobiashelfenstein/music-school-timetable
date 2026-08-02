<?php

namespace App\Application\Actions\Home;

use PDO;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

final class ViewHomeAction
{
    public $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'home/home.html.php');
    }
}