<?php

namespace Orders\OrderShipment;

use Orders\Order;

/**
 * Class ManualShipment
 *
 * @package Orders\OrderShipment
 */
class ManualShipment implements OrderShipmentInterface
{
    /**
     * @param Order $order
     */
    public function process(Order $order): void
    {
        echo "Order \"" . $order->getOrderId() . "\" NEEDS MANUAL PROCESSING\n";
    }
}