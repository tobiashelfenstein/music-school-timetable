<?php

declare(strict_types=1);

namespace App\Domain\User;


interface UserRepository
{
    public function getById(int $id): mixed;

    public function getByLogin(string $login): mixed;
}
