<?php

declare(strict_types=1);

namespace App\Application\Repository;

class TimetableRepository
{
    private $table = "units";
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getByTeacher($teacher) {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY begin ASC");
        $sql->execute();

        return $sql->fetchAll();
    }
}
