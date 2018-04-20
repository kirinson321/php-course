<?php

namespace Event\DeactivateEvent;
use Event\IEvent;


class DeactivateEvent implements IEvent
{
    private $description;

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function to_string(): string
    {
        // TODO: Implement update() method.
        return 'deactivate';
    }
}
