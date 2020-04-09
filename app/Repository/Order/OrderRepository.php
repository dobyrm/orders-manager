<?php

namespace App\Repository\Order;

use App\Dto\Order\UpdateOrderCollectionDto;
use App\Models\Order;
use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class OrderRepository implements RepositoryInterface
{
    /**
     * Get orders from structure
     *
     * @return Order[]|Collection
     */
    public function getAll()
    {
        return Order::all();
    }

    /**
     * Get order data from structure
     *
     * @param int $id
     * @return Order[]|Collection
     */
    public function getById(int $id)
    {
        return Order::findOrFail($id);
    }

    /**
     * Delete row by id from structure
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return Order::findOrFail($id)->delete();
    }

    /**
     * Find order and update order data in structure
     *
     * @param UpdateOrderCollectionDto $order
     * @return bool
     */
    public function update(UpdateOrderCollectionDto $order): bool
    {
        $entity = Order::findOrFail($order->getId());

        $entity->client_id = $order->getClientId();
        $entity->product_id = $order->getProductId();
        $entity->total = $order->getTotal();

        if ($entity->save()) {

            return true;
        }

        return false;
    }

    /**
     * Search by options in structure
     *
     * @param string $keyword
     * @param string $field
     * @return Order[]|Collection
     */
    public function searchByOptions(string $keyword, string $field)
    {
        return Order::where($field, 'LIKE', '%' . $keyword . '%')->get();
    }
}
