<?php

namespace Orders\OrderShipment;

use Orders\Order;

interface OrderShipmentInterface
{
    public function process(Order $order): void;
}
