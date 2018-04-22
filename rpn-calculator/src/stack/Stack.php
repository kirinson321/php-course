<?php

namespace Stack;

use PHPUnit\Runner\Exception;

class Stack implements IStack
{
    private $tab;
    private $pointer;

    public function __construct()
    {
        $this->tab = array();
        $this->pointer = -1;
    }


    //getters
    /**
     * @return array
     */
    public function getTab(): array
    {
        return $this->tab;
    }

    /**
     * @return int
     */
    public function getPointer(): int
    {
        return $this->pointer;
    }



    ///methods
    public function isEmpty(): bool
    {
        if ($this->pointer == -1)
        {
            return true;
        }

        return false;
    }

    public function push($number)
    {
        $this->pointer += 1;
        $this->tab[$this->pointer] = $number;
    }

    public function pop(): int
    {
        if($this->isEmpty())
        {
            throw new Exception("Cannot pop from an empty stack");
        } else
        {
            $output = $this->tab[$this->pointer];
            $this->pointer -= 1;
            return $output;
        }

    }
}