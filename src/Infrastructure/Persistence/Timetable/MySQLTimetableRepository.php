<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Timetable;


use PDO;
use App\Domain\Timetable\TimetableRepository;

class MySQLTimetableRepository implements TimetableRepository
{
    private $table = "units";
    protected $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getByTeacher(string $teacher): array
    {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY begin ASC");
        $sql->execute();

        return $sql->fetchAll();
    }
}
