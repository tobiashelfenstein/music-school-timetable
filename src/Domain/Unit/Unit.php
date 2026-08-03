<?php

declare(strict_types=1);

namespace App\Domain\Unit;


class Unit
{
    private ?int $id;
    private string $begin;
    private string $end;
    private int $type;
    private string $student;
    private string $comment = "";

    /*public function __construct(?int $id, string $begin, string $end, int $type, string $student, string $comment)
    {
        $this->id = $id;
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
        return $this->id;
    }

    public function getBegin(): string
    {
        return $this->begin;
    }

    public function getEnd(): string
    {
        return $this->end;
    }

    public function getType(): int
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
}
