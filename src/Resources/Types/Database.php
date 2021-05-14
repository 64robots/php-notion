<?php

declare(strict_types=1);

namespace R64\PhpNotion\Resources\Types;

class Database
{
    private string $object;
    private string $id;
    private string $createdTime;
    private string $lastEditedTime;
    private array $title;
    private object $properties;

    public function __construct(
        string $object,
        string $id,
        string $createdTime,
        string $lastEditedTime,
        array $title,
        object $properties
    ) {
        $this->object = $object;
        $this->id = $id;
        $this->createdTime = $createdTime;
        $this->lastEditedTime = $lastEditedTime;
        $this->title = $title;
        $this->properties = $properties;
    }

    public function object(): string
    {
        return $this->object;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function createdTime(): string
    {
        return $this->createdTime;
    }

    public function lastEditedTime(): string
    {
        return $this->lastEditedTime;
    }

    public function title(): array
    {
        return $this->title;
    }

    public function properties(): object
    {
        return $this->properties;
    }
}
