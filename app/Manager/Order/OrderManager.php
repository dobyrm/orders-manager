<?php

namespace App\Manager\Order;

use App\Dto\Order\EditOrderCollectionDto;
use App\Dto\Order\OrderCollectionDto;
use App\Dto\Order\UpdateOrderCollectionDto;
use App\Manager\BaseManager;
use App\Models\Order;
use App\Repository\Client\ClientRepository;
use App\Repository\Order\OrderRepository;
use App\Repository\Product\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Exception;

final class OrderManager extends BaseManager
{
    /**
     * @var OrderRepository $orderRepository
     */
    private $orderRepository;

    /**
     * OrderManager constructor.
     *
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
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
            $result = $this->orderRepository->getAll();
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
     * Get data for edit form
     *
     * @param $id
     * @return EditOrderCollectionDto
     * @throws Exception
     */
    public function getEditOrderById($id): EditOrderCollectionDto
    {
        $data = null;

        try {
            $result = $this->orderRepository->getById($id);
        } catch (Exception $e) {
            throw new Exception('Not data', 204);
        }

        if (!empty($result)) {
            $data = $this->editCollection($result);
        }

        return $data;
    }

    /**
     * Delete row by id from structure
     *
     * @param int $id
     * @return bool
     */
    public function deleteOrder(int $id): bool
    {
        if ($this->orderRepository->delete($id)) {

            return true;
        }

        return false;
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

                    $result = $this->orderRepository->searchByOptions($keyword, 'total');
                    if ($result->count() != 0) {
                        break;
                    }

                    $time = strtotime($keyword);
                    $date = date('Y-m-d', $time);
                    $result = $this->orderRepository->searchByOptions($date, 'created_at');
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
                    $result = $this->orderRepository->searchByOptions($keyword, 'total');
                    break;
                case 'date':
                    $time = strtotime($keyword);
                    $date = date('Y-m-d', $time);
                    $result = $this->orderRepository->searchByOptions($date, 'created_at');
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
     * Order validation data from request
     *
     * @param UpdateOrderCollectionDto $updateOrderCollectionDto
     * @return array
     */
    public function orderValidation(UpdateOrderCollectionDto $updateOrderCollectionDto)
    {
        $validationRules = [];
        $validationRules['id'] = 'required|exists:orders|numeric|min:1';
        $validationRules['client_id'] = 'required|numeric';
        $validationRules['product_id'] = 'required|numeric';
        $validationRules['total'] = 'required|numeric';
        $validator = Validator::make($updateOrderCollectionDto->toArray(), $validationRules);
        // Checked validation on model rules

        $errors = [];
        if (!empty($validator->errors()->getMessages())) {
            $errorMessages = $validator->errors()->getMessages();
            foreach ($errorMessages as $errorsField) {
                foreach ($errorsField as $errorMessage) {
                    $errors[] = $errorMessage;
                }
            }
        }

        return $errors;
    }

    /**
     * Update data order
     *
     * @param UpdateOrderCollectionDto $updateOrderCollectionDto
     * @return bool
     */
    public function updateOrder(UpdateOrderCollectionDto $updateOrderCollectionDto): bool
    {
        if ($this->orderRepository->update($updateOrderCollectionDto)) {

            return true;
        }

        return false;
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
            (float) $row->total,
            (string) $data
        );
    }

    /**
     * Collection data by format for edit form
     *
     * @param Order $row
     * @return EditOrderCollectionDto
     */
    private function editCollection(Order $row): EditOrderCollectionDto
    {
        $data = $row->created_at->format('n/j/Y');

        return new EditOrderCollectionDto(
            (int) $row->id,
            (int) $row->client->id,
            (string) $row->client->name,
            (int) $row->product->id,
            (string) $row->product->name,
            (float) $row->total,
            (string) $data
        );
    }
}
