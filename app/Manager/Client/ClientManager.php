<?php

namespace App\Manager\Client;

use App\Dto\Client\ClientCollectionDto;
use App\Manager\BaseManager;
use App\Models\Client;
use App\Repository\Client\ClientRepository;
use Exception;

final class ClientManager extends BaseManager
{
    /**
     * @var ClientRepository $repository
     */
    private $repository;

    /**
     * OrderManager constructor.
     *
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all clients from structure
     *
     * @return array
     * @throws Exception
     */
    public function getClients(): array
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
     * Collection data by format
     *
     * @param Client $row
     * @return ClientCollectionDto
     */
    private function collection(Client $row): ClientCollectionDto
    {

        return new ClientCollectionDto(
            (int) $row->id,
            (string) $row->name
        );
    }
}
