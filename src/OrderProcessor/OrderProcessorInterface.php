<?php

namespace Orders\OrderProcessor;

use Orders\Order;

interface OrderProcessorInterface
{
    /**
     * @param $order Order
     */
    public function process(Order $order): void;
}
