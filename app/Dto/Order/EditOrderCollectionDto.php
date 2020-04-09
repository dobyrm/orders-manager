<?php

namespace App\Dto\Order;

final class EditOrderCollectionDto
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var int $clientId
     */
    private $clientId;

    /**
     * @var string $clientName
     */
    private $clientName;

    /**
     * @var int $productId
     */
    private $productId;

    /**
     * @var string $productName
     */
    private $productName;

    /**
     * @var float $total
     */
    private $total;

    /**
     * @var string $date
     */
    private $date;

    /**
     * EditOrderCollectionDto constructor.
     *
     * @param int $id
     * @param int $clientId
     * @param string $clientName
     * @param int $productId
     * @param string $productName
     * @param float $total
     * @param string $date
     */
    public function __construct(
        int $id,
        int $clientId,
        string $clientName,
        int $productId,
        string $productName,
        float $total,
        string $date
    )
    {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->clientName = $clientName;
        $this->productId = $productId;
        $this->productName = $productName;
        $this->total = $total;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
