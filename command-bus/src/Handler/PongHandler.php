<?php

namespace Handler;

use Command\PongCommand;

class PongHandler implements IHandler
{
    public function __invoke(PongCommand $command)
    {
        $command->passData();
    }

}