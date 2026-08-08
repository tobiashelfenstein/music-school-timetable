<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Unit;


use PDO;
use App\Domain\Unit\Unit;
use App\Domain\Unit\UnitRepository;
use DatePeriod;

class MySQLUnitRepository implements UnitRepository
{
    private $table = "units";
    protected $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // https://phpdelusions.net/pdo/objects
    public function getAll(DatePeriod $dp, int $teacher): array
    {
        $weekdays = "";
        $case_string = "";
        $counter = 0;
        $delim = '';
        foreach ($dp as $day) {
            // leerzeichen!
            $case_string = $case_string . $delim . "GROUP_CONCAT(CASE WHEN attendance.date = '" . $day->format("Y-m-d") . "' THEN ats.type END) AS d" . $counter;
            $weekdays = $weekdays . $delim . "'" . $day->format("Y-m-d") . "'";
            $delim = ',';
            $counter++;
        }

        //$sql = $this->db->prepare("SELECT id, begin, end, type, student, comment FROM " . $this->table . " WHERE date IN (" . $weekdays . ") ORDER BY begin ASC");
        //$sql = $this->db->prepare("SELECT id, begin, end, type, student, comment FROM " . $this->table . " ORDER BY begin ASC");
        //$sql->setFetchMode(PDO::FETCH_CLASS, Unit::class);


        $sql = $this->db->prepare("SELECT attendance.unit, u.begin, u.end, ut.type, u.student, u.comment, "
            . $case_string .
            " FROM attendance
            INNER JOIN units u ON attendance.unit = u.id
            INNER JOIN unit_types ut ON u.type = ut.id
            LEFT JOIN attendance_types ats ON attendance.attendance = ats.attendance
            WHERE attendance.date IN (" . $weekdays . ") AND attendance.unit IN (SELECT id FROM units WHERE teacher = " . $teacher . ")
            GROUP BY attendance.unit, u.begin, u.end, ut.type, u.student, u.comment");


            //FROM " . $this->table . " WHERE date IN (" . $weekdays . ") ORDER BY begin ASC");
        $sql->setFetchMode(PDO::FETCH_CLASS, Unit::class);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getUnitById(int $id): Unit
    {
        echo "Hello, World!";

    }
}
