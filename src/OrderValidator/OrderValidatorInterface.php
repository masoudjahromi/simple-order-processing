<?php

namespace Orders\OrderValidator;

use Orders\Order;

interface OrderValidatorInterface
{
    public function validate(Order $order): void;
}
