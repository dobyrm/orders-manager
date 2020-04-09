<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class ProductRepository implements RepositoryInterface
{
    /**
     * Get products from structure
     *
     * @return Product[]|Collection
     */
    public function getAll()
    {
        return Product::all();
    }

    /**
     * Get product data from structure
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
     * @return Product[]|Collection
     */
    public function searchByOptions(string $keyword, string $field)
    {
        return Product::where($field, 'LIKE', '%' . $keyword . '%')->get();
    }
}
