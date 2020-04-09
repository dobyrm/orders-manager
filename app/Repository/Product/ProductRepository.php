<?php

namespace App\Repository\Product;

use App\Models\Product;

final class ProductRepository
{
    /**
     * Get orders from structure orders
     *
     */
    public function getAll()
    {
        //
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
     */
    public function delete(int $id)
    {
        //
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
        return Product::where($field, 'LIKE', '%' . $keyword . '%')->get();
    }
}
