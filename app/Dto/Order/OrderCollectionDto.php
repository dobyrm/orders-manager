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
     * @var int $total
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
     * @param int $total
     * @param string $date
     */
    public function __construct(
        int $id,
        string $client,
        string $product,
        int $total,
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
     * @return int
     */
    public function getTotal(): int
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
