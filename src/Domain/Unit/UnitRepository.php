<?php

declare(strict_types=1);

namespace App\Domain\Unit;


interface UnitRepository
{
    // retruns array of Units
    public function getAll(): array;

    // return single Unit
    public function getUnitById(int $id): Unit;
}
