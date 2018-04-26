<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Stack\Stack;


final class StackTest extends TestCase
{
    public function testIsEmpty()
    {
        $testStack = new Stack();
        $this->assertEquals(true, $testStack->isEmpty());

        $testStack->push(10);
        $this->assertEquals(false, $testStack->isEmpty());
    }

    public function testPush()
    {
        $testStack = new Stack();
        $this->assertEquals(-1, $testStack->getPointer());

        $testStack->push(10);
        $this->assertEquals(0, $testStack->getPointer());
    }

    public function testPop()
    {
        $testStack = new Stack();
        $this->assertEquals(-1, $testStack->getPointer());

        $testStack->push(10);
        $this->assertEquals(0, $testStack->getPointer());

        $testStack->pop();
        $this->assertEquals(-1, $testStack->getPointer());
    }
}