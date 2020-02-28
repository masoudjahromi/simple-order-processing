<?php

namespace Orders\OrderShipment;

use Orders\Order;

interface OrderShipmentResolverInterface
{
    public function resolve(Order $order);
}
