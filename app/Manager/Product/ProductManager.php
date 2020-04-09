<?php

namespace App\Manager\Product;

use App\Dto\Product\ProductCollectionDto;
use App\Manager\BaseManager;
use App\Models\Product;
use App\Repository\Product\ProductRepository;
use Exception;

final class ProductManager extends BaseManager
{
    /**
     * @var ProductRepository $productRepository
     */
    private $productRepository;

    /**
     * ProductManager constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Get all products from structure
     *
     * @return array
     * @throws Exception
     */
    public function getProducts(): array
    {
        $data = [];

        try {
            $result = $this->productRepository->getAll();
        } catch (Exception $e) {
            throw new Exception('Not data', 204);
        }

        if (!empty($result)) {

            foreach ($result as $row) {
                $data[] = $this->collection($row);
            }
        }

        return $data;
    }

    /**
     * Collection data by format
     *
     * @param Product $row
     * @return ProductCollectionDto
     */
    private function collection(Product $row): ProductCollectionDto
    {

        return new ProductCollectionDto(
            (int) $row->id,
            (string) $row->name,
            (float) $row->price
        );
    }
}
