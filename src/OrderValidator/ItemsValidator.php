<?php

namespace Orders\OrderValidator;

use Orders\Order;

class ItemsValidator implements ValidatorInterface
{
    /**
     * @param Order $order
     *
     * @return bool
     */
    public function isValid(Order $order): bool
    {
        foreach ($order->getItems() as $itemId) {
            if (!is_int($itemId)) {
                return false;
            }
        }

        return true;
    }
}
