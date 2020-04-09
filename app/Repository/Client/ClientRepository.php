<?php

namespace App\Repository\Client;

use App\Models\Client;
use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class ClientRepository implements RepositoryInterface
{
    /**
     * Get clients from structure
     *
     * @return Client[]|Collection
     */
    public function getAll()
    {
        return Client::all();
    }

    /**
     * Get client data from structure
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
     * @return Client[]|Collection
     */
    public function searchByOptions(string $keyword, string $field)
    {
        return Client::where($field, 'LIKE', '%' . $keyword . '%')->get();
    }
}
