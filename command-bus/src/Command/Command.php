<?php

namespace Command;

abstract class Command
{
    /**
     * @var \DateTime
     */
    private $created;
    abstract public function passData();

}