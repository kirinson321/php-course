<?php

namespace RPNCalculator;
use Stack\Stack;

class RPNCalculator implements IRPNCalculator
{
    private $stack;
    private $expression;

    public function __construct()
    {
        $this->stack = new Stack();
        $this->expression = '';
    }


     public function evaluate(string $input_expression): int
    {
        $this->expression = explode(' ', $input_expression);

        foreach($this->expression as $symbol)
        {
           if(is_numeric($symbol))
           {
               $this->stack->push($symbol);
           } else
           {
               $a= $this->stack->pop();
               $b = $this->stack->pop();

               switch ($symbol)
               {
                   case '+':
                       $result = $b + $a;
                       break;
                   case '-':
                       $result = $b - $a;
                       break;
                   case '*':
                       $result = $b * $a;
                       break;
                   case '/':
                       $result = $b / $a;
                       break;
                   default:
                       throw new \Exception("Bad operator");
               }

               $this->stack->push($result);
           }
        }

        return $this->stack->pop();
    }

    /**
     * @return Stack
     */
    public function getStack(): Stack
    {
        return $this->stack;
    }

    /**
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
}