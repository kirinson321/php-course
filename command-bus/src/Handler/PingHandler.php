<?php

namespace Handler;

use Command\PingCommand;

class PingHandler implements IHandler
{
    public function __invoke(PingCommand $command)
    {
        $command->passData();
    }

}