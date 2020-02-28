<?php

namespace Orders;

/**
 * Class Order
 *
 * @package Orders
 */
class Order
{
	/**
	 * @var int
	 */
	private $orderId;
	/**
	 * @var bool
	 */
    private $isManual = false;
	/**
	 * @var string
	 */
    private $name;
	/**
	 * @var array
	 */
    private $items;
	/**
	 * @var float
	 */
    private $totalAmount;
	/**
	 * @var string
	 */
    private $deliveryDetails;
    /**
     * @var bool
     */
    private $isValid;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return bool
     */
    public function isManual(): bool
    {
        return $this->isManual;
    }

    /**
     * @param bool $manual
     *
     * @return bool
     */
    public function setManual($manual)
    {
        $this->isManual = $manual;
    }

	/**
	 * @param string $name
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

	/**
	 * @param array $items
	 */
	public function setItems(array $items)
	{
		$this->items = $items;
	}

    /**
     * @param int $item
     */
    public function addItem(int $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getItemsCount()
    {
        return count($this->items);
    }

	/**
	 * @param float $totalAmount
	 */
	public function setTotalAmount(float $totalAmount)
	{
		$this->totalAmount = $totalAmount;
	}

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @param int $amount
     */
    public function increaseTotalAmount(int $amount)
    {
        $this->totalAmount += $amount;
    }

    /**
     * @param string $deliveryDetails
     */
	public function setDeliveryDetails($deliveryDetails)
	{
		$this->deliveryDetails = $deliveryDetails;
	}

    /**
     * @return string
     */
    public function getDeliveryDetails(): string
    {
        return $this->deliveryDetails;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }
}