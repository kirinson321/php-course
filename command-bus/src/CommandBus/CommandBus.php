<?php

namespace CommandBus;

use Command\Command;
use Command\PingCommand;
use Command\PongCommand;
use Handler\PingHandler;
use Handler\PongHandler;
use Router\DirectRouter;


//wstrzykniecie routera (?) jak to powinno wygladac
//byc moze opcjonalny argument do konstuktora, ktory defaultowo jest ustawiony?


class CommandBus
{

    private $m_router;
    //private $m_command;

    public function __construct(DirectRouter $optional_router = NULL)
    {
        if($optional_router)
        {
          $this->m_router = $optional_router;
          //$this->m_command = $command;
        } else
        {
            $this->m_router = new DirectRouter([
                PingCommand::class => PingHandler::class,
                PongCommand::class => PongHandler::class,
            ]);

            //$this->m_command = $command;
        }
    }


    /**
    * @throws NoRouteFoundException
    */
    public function dispatch(Command $command)
    {
        $router = $this->m_router;
        $invoker_command = $router->handle($command);
        $command_route = new $invoker_command;
        $command_route($command);
    }
}

