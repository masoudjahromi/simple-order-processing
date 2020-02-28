<?php

namespace Orders\OrderValidator;

use Orders\Order;

class OrderValidator implements OrderValidatorInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct()
    {
        $this->validator = new TotalValidator;
    }

    /**
	 * @param $order Order
	 */
    public function validate(Order $order): void
    {
	    $order->setIsValid($this->validator->isValid($order));
    }
}