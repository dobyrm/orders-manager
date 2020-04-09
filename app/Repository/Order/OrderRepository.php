<?php

namespace App\Repository\Order;

use App\Models\Order;

final class OrderRepository
{
    /**
     * Get orders from structure orders
     *
     */
    public function getAll()
    {
        return Order::all();
    }

    /**
     * Get order data from structure orders
     *
     * @param int $id
     */
    public function getById(int $id)
    {
        //
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
     * Search by options in structure
     *
     * @param string $keyword
     * @param string $field
     * @return mixed
     */
    public function searchByOptions(string $keyword, string $field)
    {
        return Order::where($field, 'LIKE', '%' . $keyword . '%')->get();
    }
}
