<?php

namespace App\Dto\Order;

final class OrderCollectionDto
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $client
     */
    private $client;

    /**
     * @var string $product
     */
    private $product;

    /**
     * @var float $total
     */
    private $total;

    /**
     * @var string $date
     */
    private $date;

    /**
     * OrderCollectionDto constructor.
     *
     * @param int $id
     * @param string $client
     * @param string $product
     * @param float $total
     * @param string $date
     */
    public function __construct(
        int $id,
        string $client,
        string $product,
        float $total,
        string $date
    )
    {
        $this->id = $id;
        $this->client = $client;
        $this->product = $product;
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
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
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
