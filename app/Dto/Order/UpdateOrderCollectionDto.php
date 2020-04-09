<?php

namespace App\Dto\Order;

final class UpdateOrderCollectionDto
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
     * @var int $productId
     */
    private $productId;

    /**
     * @var float $total
     */
    private $total;

    /**
     * EditOrderCollectionDto constructor.
     *
     * @param int $id
     * @param int $clientId
     * @param int $productId
     * @param float $total
     */
    public function __construct(
        int $id,
        int $clientId,
        int $productId,
        float $total
    )
    {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->productId = $productId;
        $this->total = $total;
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
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'client_id'     => $this->clientId,
            'product_id'    => $this->productId,
            'total'         => $this->total,
        ];
    }
}
