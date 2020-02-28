<?php

namespace Orders\OrderShipment;

use Orders\Order;

/**
 * Class AutomaticShipment
 *
 * @package Orders\OrderShipment
 */
class AutomaticShipment implements OrderShipmentInterface
{
    /**
     * @param Order $order
     */
    public function process(Order $order): void
    {
        echo "Order \"" . $order->getOrderId() . "\" WILL BE PROCESSED AUTOMATICALLY\n";
    }
}
