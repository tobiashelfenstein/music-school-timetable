<?php

declare(strict_types=1);

namespace App\Domain\User;

class User
{
    private $table = "user";
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getById($id) {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        return $sql->fetch();
    }

    public function getByLogin($login) {
        $sql = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE LOWER(username) = LOWER(:username)");
        $sql->bindParam(':username', $login);
        $sql->execute();

        return $sql->fetch();
    }
}
