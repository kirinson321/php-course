<?php

namespace Stack;

interface IStack
{
    public function isEmpty(): bool;
    public function push($number);
    public function pop(): int;

}