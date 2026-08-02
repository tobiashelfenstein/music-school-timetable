<?php

declare(strict_types=1);

namespace App\Domain\Timetable;


interface TimetableRepository
{
    public function getByTeacher(string $teacher): array;
}
