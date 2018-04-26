<?php

namespace RPNCalculator;

interface IRPNCalculator
{
    public function evaluate(string $input_expression);
}