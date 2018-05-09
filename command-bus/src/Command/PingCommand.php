<?php

namespace Command;

class PingCommand extends Command
{
    private $created;

    public function __construct()
    {
        $this->created = date("Y/m/d h:i:sa");
    }

    public function passData()
    {
        // TODO: Implement passData() method.
        echo 'PING!' . PHP_EOL;
    }
}