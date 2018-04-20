<?php

namespace Event\ActivateEvent;
use Event\IEvent;


class ActivateEvent implements IEvent
{
    private $description;

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function to_string(): string
    {
        // TODO: Implement update() method.
        //return 'Activate wallet because of ' . $this->description;
        return 'activate';
    }
}
