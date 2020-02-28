<?php

namespace Orders\OrderDelivery;

use Orders\Order;

interface OrderDeliveryInterface
{
    public function getDeliveryDetails(Order $order): string;
}
