<?php

namespace Orders\OrderValidator;

use Orders\Order;

class NameValidator implements ValidatorInterface
{
    private const MIN_LENGTH = 2;

    /**
     * @param Order $order
     *
     * @return bool
     */
    public function isValid(Order $order): bool
    {
        return strlen($order->getName()) > self::MIN_LENGTH;
    }
}