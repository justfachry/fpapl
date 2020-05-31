<?php

namespace loweffortgooglecalendar\Domain\Model;

class Group
{
    private $id;
    private $name;
    private $description;
    private $created_by;

    public function __construct(GroupId $id, string $name, string $description, string $created_by) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->created_by = $created_by;
    }
    public function getId() : GroupId
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function description()
    {
        return $this->description;
    }

    public function created_by()
    {
        return $this->created_by;
    }
}