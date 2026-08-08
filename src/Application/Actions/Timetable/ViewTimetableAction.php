<?php

namespace App\Application\Actions\Timetable;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Slim\Routing\RouteContext;
use App\Domain\Unit\UnitRepository;
use DateTime;
use DatePeriod;
use DateInterval;

class ViewTimetableAction
{
    private UnitRepository $unitRepository;

    private int $teacher;
    private int $year;
    private int $month;
    private int $weekday;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;

        $this->teacher = 0; // all teachers
        $this->year = date('Y'); // current year
        $this->month = date('n'); // current month as number
        $this->weekday = date('N'); // current day of week as number
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        if (isset($queryParams['teacher'])) {
            $this->teacher = $queryParams['teacher'];
        }

        if (isset($queryParams['year'])) {
            $this->year = $queryParams['year'];
        }

        if (isset($queryParams['month'])) {
            $this->month = $queryParams['month'];
        }

        if (isset($queryParams['weekday'])) {
            $this->weekday = $queryParams['weekday'];
        }

        $dp = $this->getAllWeekdaysByMonth();


    
        $viewData = [
            'units' => $this->unitRepository->getAll($dp, $this->teacher),
            'teacher' => $this->teacher,
            'year' => $this->year,
            'month' => $this->month,
            'weekday' => $this->weekday,
            'dp' => $dp,
        ];

        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');

        return $renderer->render($response, 'timetable/view.html.php', $viewData);
    }

    private function getAllWeekdaysByMonth(): DatePeriod
    {

        // https://gist.github.com/Alexander-Pop/1650353588eaa2a684a34efdf3a15147
        $dayNames = [
        '1' => "monday",
        '2' => "tuesday",
        '3' => "wednesday",
        '4' => "thursday",
        '5' => "friday",
        '6' => "saturday",
        '7' => "sunday",
        ];


        $begin = new DateTime("first " . $dayNames[$this->weekday] . " of " . $this->year . "-" . $this->month);
        $interval = "next " . $dayNames[$this->weekday];
        $end = new DateTime("last day of " . $this->year . "-" . $this->month);
        
        $dp = new DatePeriod($begin, DateInterval::createFromDateString($interval), $end, DatePeriod::INCLUDE_END_DATE);

        return $dp;

    }
}