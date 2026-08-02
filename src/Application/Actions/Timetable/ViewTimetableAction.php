<?php

namespace App\Application\Actions\Timetable;


use PDO;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Slim\Routing\RouteContext;
use App\Domain\Timetable\TimetableRepository;

final class ViewTimetableAction {
    private TimetableRepository $timetableRepository;

    public function __construct(TimetableRepository $timetableRepository) {
        $this->timetableRepository = $timetableRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $viewData = [
            'units' => $this->timetableRepository->getByTeacher("test"),
        ];

        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'timetable/timetable.html.php', $viewData);
    }
}