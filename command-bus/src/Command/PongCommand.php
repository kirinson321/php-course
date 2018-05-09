<?php

namespace Command;

class PongCommand extends Command
{
    private $created;

    public function __construct()
    {
        $this->created = date("Y/m/d h:i:sa");
    }

    public function passData()
    {
        // TODO: Implement passData() method.
        echo 'PONG!' . PHP_EOL;
    }
}