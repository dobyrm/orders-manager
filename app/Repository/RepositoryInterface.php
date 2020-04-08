<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function searchByOptions(string $keyword, string $field);
}
