<?php

namespace App\Application\Actions\Timetable;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Slim\Routing\RouteContext;
use App\Domain\Unit\UnitRepository;

class EditTimetableAction {
    private UnitRepository $uniteRepository;

    public function __construct(UnitRepository $unitRepository) {
        $this->unitRepository = $unitRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $unitId = $request->getAttribute('id');
    
    
        $viewData = [
            'unitId' => $unitId,
        ];

        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'timetable/edit.html.php', $viewData);
    }
}