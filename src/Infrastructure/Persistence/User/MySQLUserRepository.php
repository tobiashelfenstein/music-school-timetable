<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;


use PDO;
use App\Domain\User\UserRepository;

class MySQLUserRepository implements UserRepository
{
    private $table = "user";
    protected $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getById(int $id): mixed
    {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        return $sql->fetch();
    }

    public function getByLogin(string $login): mixed
    {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE LOWER(username) = LOWER(:username)");
        $sql->bindParam(':username', $login);
        $sql->execute();

        return $sql->fetch();
    }
}
