<?php

namespace Orders\OrderProcessor\ResultHandler;

use Orders\Order;

/**
 * Class FileHandler
 *
 * @package Orders\OrderProcessor\ResultHandler
 */
class FileHandler implements ResultHandlerInterface
{
    /**
     * @param Order $order
     *
     * @param array $info
     */
    public function handle(Order $order, array $info): void
    {
        file_put_contents('orderProcessLog', @file_get_contents('orderProcessLog') . implode("\n", $info));
        if ($order->isValid()) {
            $file = @file_get_contents('result');
            $data = [
                $order->getOrderId(),
                implode(',', $order->getItems()),
                $order->getDeliveryDetails(),
                ($order->isManual() ? 1 : 0),
                $order->getName(),
            ];
            $data = $file . implode(' - ', $data) . "\n";
            file_put_contents('result', $data);
        }
    }
}
