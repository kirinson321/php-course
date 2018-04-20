<?php

namespace Event\DepositEvent;
use Event\IEvent;


class DepositEvent implements IEvent
{
    private $description;
    private $amount;
    private $currency;

    public function __construct($description, $amount, $currency)
    {
        $this->description = $description;
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function to_string(): string
    {
        // TODO: Implement update() method.
        return $this->description . ' ' . $this->amount . ' ' . $this->currency;
    }
}
