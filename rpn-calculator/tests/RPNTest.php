<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use RPNCalculator\RPNCalculator;

final class RPNTest extends TestCase
{
    public function testEvaluate()
    {
        $testCalc = new RPNCalculator();
        $testExpr = "15 7 1 1 + - / 3 * 2 1 1 + + -";
        $this->assertEquals(5, $testCalc->evaluate($testExpr));
    }
}