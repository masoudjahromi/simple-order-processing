<?php

namespace Orders\OrderDelivery;

use Orders\Order;

/**
 * Class OrderDeliveryDetails
 *
 * @package Orders\OrderDelivery
 */
class OrderDeliveryDetails implements OrderDeliveryInterface
{
    public function getDeliveryDetails(Order $order): string
    {
        if ($order->getItemsCount() > 1) {
            return 'Order delivery time: 2 days';
        }

        return 'Order delivery time: 1 day';
    }
}
