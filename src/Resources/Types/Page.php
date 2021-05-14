<?php
declare(strict_types=1);

namespace R64\PhpNotion\Resources\Types;

class Page
{
    private string $object;

    private string $id;

    private string $createdTime;

    private string $lastEditedTime;

    private bool $archived;

    private object $parent;

    public function __construct(
        string $object,
        string $id,
        string $createdTime,
        string $lastEditedTime,
        object $properties,
        bool $archived,
        object $parent
    )
    {
        $this->object = $object;
        $this->id = $id;
        $this->createdTime = $createdTime;
        $this->lastEditedTime = $lastEditedTime;
        $this->properties = $properties;
        $this->archived = $archived;
        $this->parent = $parent;
    }

    /**
     * @return object|object
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return bool|bool
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @return object
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLastEditedTime()
    {
        return $this->lastEditedTime;
    }

    /**
     * @return string|string
     */
    public function getObject()
    {
        return $this->object;
    }
}
