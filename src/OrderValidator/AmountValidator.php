<?php

namespace Orders\OrderValidator;

use Orders\Order;

class AmountValidator implements ValidatorInterface
{
    /**
     * @var string
     */
    public $minimumAmount;

    /**
     * AmountValidator constructor.
     */
    public function __construct()
    {
        $this->minimumAmount = file_get_contents('input/minimumAmount');
    }

    /**
     * @param Order $order
     *
     * @return bool
     */
    public function isValid(Order $order): bool
    {
        return $order->getTotalAmount() > 0 && $order->getTotalAmount() > $this->minimumAmount;
    }
}