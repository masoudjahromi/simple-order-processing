<?php

namespace Orders\OrderValidator;

use Orders\Order;

interface ValidatorInterface
{
    public function isValid(Order $order): bool;
}
