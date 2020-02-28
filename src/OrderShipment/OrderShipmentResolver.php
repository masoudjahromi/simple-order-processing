<?php

namespace Orders\OrderShipment;

use Orders\Order;

/**
 * Class OrderShipmentResolver
 *
 * @package Orders\OrderShipment
 */
class OrderShipmentResolver implements OrderShipmentResolverInterface
{
    /**
     * @var OrderShipmentInterface
     */
    private $manualShipment;
    /**
     * @var OrderShipmentInterface
     */
    private $automaticShipment;

    /**
     * OrderShipmentResolver constructor.
     */
    public function __construct()
    {
        $this->manualShipment = new ManualShipment;
        $this->automaticShipment = new AutomaticShipment;
    }

    /**
     * @param Order $order
     *
     * @return AutomaticShipment|ManualShipment|OrderShipmentInterface
     */
    public function resolve(Order $order)
    {
        if ($order->isManual()) {
            return $this->manualShipment;
        }

        return $this->automaticShipment;
    }
}
