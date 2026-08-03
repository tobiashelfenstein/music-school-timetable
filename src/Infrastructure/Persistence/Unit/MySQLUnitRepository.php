<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Unit;


use PDO;
use App\Domain\Unit\Unit;
use App\Domain\Unit\UnitRepository;

class MySQLUnitRepository implements UnitRepository
{
    private $table = "units";
    protected $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // https://phpdelusions.net/pdo/objects
    public function getAll(): array
    {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY begin ASC");
        $sql->setFetchMode(PDO::FETCH_CLASS, Unit::class);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function getUnitById(int $id): Unit
    {
        echo "Hello, World!";

    }
}
