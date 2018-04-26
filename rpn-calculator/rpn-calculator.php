<?php
require_once __DIR__ . '/vendor/autoload.php';

use RPNCalculator\RPNCalculator;

$expression = $argv[1];
$beta = "15 7 1 1 + - / 3 * 2 1 1 + + -";
$evaluator = new RPNCalculator();

echo $evaluator->evaluate($beta);