<?php
declare(strict_types=1);

namespace R64\PhpNotion\Resources\Types;

class NotionUser
{
    private string $object;

    private string $id;

    private string $name;

    private string $type;

    private object $person;

    private $avatar;

    private $properties;

    public function __construct(string $object, string $id, string $name, $avatar, string $type, $properties)
    {
        $this->object = $object;

        $this->id  = $id;

        $this->name = $name;

        $this->avatar = $avatar;

        $this->type = $type;

        $this->properties = $properties;
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->object;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return string|string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
