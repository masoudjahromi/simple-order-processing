<?php

namespace Orders\OrderProcessor;

use Orders\Order;
use Orders\OrderDelivery\OrderDeliveryDetails;
use Orders\OrderDelivery\OrderDeliveryInterface;
use Orders\OrderValidator\OrderValidatorInterface;
use Orders\OrderShipment\OrderShipmentResolverInterface;
use Orders\OrderProcessor\ResultHandler\ResultHandlerInterface;

/**
 * Class OrderProcessor
 *
 * @package Orders\OrderProcessor
 */
class OrderProcessor implements OrderProcessorInterface
{
    private const LARGE_ITEMS = [3231, 9823];
    private const LARGE_ITEM_INCREASE_AMOUNT = 100;

    /**
     * @var OrderValidatorInterface
     */
	private $validator;
	/**
	 * @var OrderDeliveryDetails
	 */
	private $orderDeliveryDetails;
    /**
     * @var ResultHandlerInterface
     */
    private $resultHandler;
    /**
     * @var OrderShipmentResolverInterface
     */
    private $orderShipmentResolver;

    /**
     * OrderProcessor constructor.
     *
     * @param OrderDeliveryInterface         $orderDeliveryDetails
     * @param OrderValidatorInterface        $orderValidator
     * @param ResultHandlerInterface         $resultHandler
     * @param OrderShipmentResolverInterface $orderShipmentResolver
     */
    public function __construct(
	    OrderDeliveryInterface $orderDeliveryDetails,
        OrderValidatorInterface $orderValidator,
        ResultHandlerInterface $resultHandler,
        OrderShipmentResolverInterface $orderShipmentResolver
    ) {
		$this->orderDeliveryDetails = $orderDeliveryDetails;
		$this->validator = $orderValidator;
        $this->resultHandler = $resultHandler;
        $this->orderShipmentResolver = $orderShipmentResolver;
    }

	/**
	 * @param $order Order
	 */
	public function process(Order $order): void
	{
		ob_start();
		echo "Processing started, OrderId: {$order->getOrderId()}\n";
		$this->validator->validate($order);

		if ($order->isValid()) {
			echo "Order is valid\n";
			$this->addDeliveryCostLargeItem($order);
			$this->orderShipmentResolver->resolve($order)->process($order);
			$deliveryDetails = $this->orderDeliveryDetails->getDeliveryDetails($order);
			$order->setDeliveryDetails($deliveryDetails);
		} else {
			echo "Order is invalid\n";
		}
		$info = $this->getInfo($order);
		$this->resultHandler->handle($order, $info);
	}

	/**
	 * @param $order Order
	 */
	private function addDeliveryCostLargeItem(Order $order)
	{
		foreach ($order->getItems() as $item) {
			if (in_array($item, self::LARGE_ITEMS)) {
				$order->increaseTotalAmount(self::LARGE_ITEM_INCREASE_AMOUNT);
			}
		}
	}

    /**
     * @param Order $order
     *
     * @return array
     */
	private function getInfo(Order $order)
	{
		$result = ob_get_contents();

		if (!$order->isValid()) {
		    return [$result];
        }

        $lines = explode("\n", $result);
        $lineWithoutDebugInfo = [];
        foreach ($lines as $line) {
            if (strpos($line, 'Reason:') === false) {
                $lineWithoutDebugInfo[] = $line;
            }
        }

		return $lineWithoutDebugInfo;
	}
}