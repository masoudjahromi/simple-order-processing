<?php

use Orders\Order;
use Orders\OrderProcessor\OrderProcessor;
use Orders\OrderValidator\OrderValidator;
use Orders\OrderDelivery\OrderDeliveryDetails;
use Orders\OrderShipment\OrderShipmentResolver;
use Orders\OrderProcessor\ResultHandler\FileHandler;

require_once 'vendor/autoload.php';

$order = new Order();
$order->setOrderId(2);
$order->setName('Masoud');
$order->setItems([ 6654 ]);
$order->setTotalAmount(346.2);

$orderProcessor = new OrderProcessor(new OrderDeliveryDetails, new OrderValidator, new FileHandler, new OrderShipmentResolver);
$orderProcessor->process($order);
