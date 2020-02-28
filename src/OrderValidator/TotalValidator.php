<?php

namespace Orders\OrderValidator;

use Orders\Order;

class TotalValidator implements ValidatorInterface
{
    /**
     * @var ValidatorInterface[]
     */
    private $validators = [];

    /**
     * TotalValidator constructor.
     */
    public function __construct()
    {
        $this->validators = [
            new NameValidator,
            new AmountValidator,
            new ItemsValidator,
        ];
    }

    /**
     * @param Order $order
     *
     * @return bool
     */
    public function isValid(Order $order): bool
    {
        foreach ($this->validators as $index => $validator) {
            if (!$validator->isValid($order)) {
                return false;
            }
        }

        return true;
    }
}
