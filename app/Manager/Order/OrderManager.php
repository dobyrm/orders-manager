<?php

namespace App\Manager\Order;

use App\Dto\Order\OrderCollectionDto;
use App\Manager\BaseManager;
use App\Models\Order;
use App\Repository\Client\ClientRepository;
use App\Repository\Order\OrderRepository;
use App\Repository\Product\ProductRepository;
use Exception;

final class OrderManager extends BaseManager
{
    /**
     * @var OrderRepository $repository
     */
    private $repository;

    /**
     * OrderManager constructor.
     *
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all orders from structure
     *
     * @return array
     * @throws Exception
     */
    public function getOrders(): array
    {
        $data = [];

        try {
            $result = $this->repository->getAll();
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
     * @param string $keyword
     * @param string $field
     * @return array
     * @throws Exception
     */
    public function searchOrders(string $keyword, string $field = ''): array
    {
        $data = [];
        $result = null;
        try {
            switch ($field) {
                case 'all':
                    $clientRepository = new ClientRepository();
                    $result = $clientRepository->searchByOptions($keyword, 'name');
                    if ($result->count() != 0) {
                        break;
                    }

                    $productRepository = new ProductRepository();
                    $result = $productRepository->searchByOptions($keyword, 'name');
                    if ($result->count() != 0) {
                        break;
                    }

                    $result = $this->repository->searchByOptions($keyword, 'total');
                    if ($result->count() != 0) {
                        break;
                    }

                    $time = strtotime($keyword);
                    $date = date('Y-m-d', $time);
                    $result = $this->repository->searchByOptions($date, 'created_at');
                    break;
                case 'client':
                    $clientRepository = new ClientRepository();
                    $result = $clientRepository->searchByOptions($keyword, 'name');
                    break;
                case 'product':
                    $productRepository = new ProductRepository();
                    $result = $productRepository->searchByOptions($keyword, 'name');
                    break;
                case 'total':
                    $result = $this->repository->searchByOptions($keyword, 'total');
                    break;
                case 'date':
                    $time = strtotime($keyword);
                    $date = date('Y-m-d', $time);
                    $result = $this->repository->searchByOptions($date, 'created_at');
                    break;
                default:
                    $result = Order::all();
            }
        } catch (Exception $e) {
            throw new Exception('Not data', 204);
        }

        if (!empty($result)) {

            foreach ($result as $row) {
                if ((isset($row->orders)) && !(empty($row->orders))) {
                    foreach ($row->orders as $row) {
                        $data[] = $this->collection($row);
                    }

                    continue;
                }

                $data[] = $this->collection($row);
            }
        }

        return $data;
    }

    /**
     * Collection data by format
     *
     * @param Order $row
     * @return OrderCollectionDto
     */
    private function collection(Order $row): OrderCollectionDto
    {
        $data = $row->created_at->format('n/j/Y');

        return new OrderCollectionDto(
            (int) $row->id,
            (string) $row->client->name,
            (string) $row->product->name,
            (int) $row->total,
            (string) $data
        );
    }
}
