<?php

namespace Router;

use Command\Command;

class DirectRouter implements IRouter
{
    private $m_handlers;

    public function __construct(Array $handlers)
    {
        $this->m_handlers = $handlers;
    }

    public function handle(Command $command)
    {
        if(array_key_exists(get_class($command), $this->m_handlers))
        {
            return $this->m_handlers[get_class($command)];
        } else
        {
            throw new \Exception("No such command in the system");
        }
    }

}