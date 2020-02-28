<?php

namespace Orders\OrderProcessor\ResultHandler;

use Orders\Order;

interface ResultHandlerInterface
{
    public function handle(Order $order, array $info): void;
}
