<?php

declare(strict_types=1);

namespace App\Domain\Unit;


class Unit
{
    private ?int $unit;
    private string $begin;
    private string $end;
    private string $type;
    private string $student;
    private ?string $d0 = "";
    private ?string $d1 = "";
    private ?string $d2 = "";
    private ?string $d3 = "";
    private ?string $d4 = "";
    private string $comment = "";

    /*public function __construct(?int $unit, string $begin, string $end, int $type, string $student, string $comment)
    {
        $this->id = $unit;
        $this->begin = $begin;
        $this->end = $end;
        $this->type = $type;
        $this->student = $student;
        $this->comment = $comment;
    }*/

    public function __construct() {}

    public function __set($name, $value) {}


    public function getId(): ?int
    {
        return $this->unit;
    }

    public function getBegin(): string
    {
        return $this->begin;
    }

    public function getEnd(): string
    {
        return $this->end;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStudent(): string
    {
        return $this->student;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getDayAttendance(): array
    {
        return array($this->d0, $this->d1, $this->d2, $this->d3, $this->d4);
    }
}
