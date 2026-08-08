<?php

declare(strict_types=1);

namespace App\Domain\Unit;


use DatePeriod;

interface UnitRepository
{
    // retruns array of Units
    public function getAll(DatePeriod $dp, int $teacher): array;

    // return single Unit
    public function getUnitById(int $id): Unit;
}
