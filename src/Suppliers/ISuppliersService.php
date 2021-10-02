<?php

declare(strict_types=1);

namespace Inventory\Suppliers;

interface ISuppliersService
{
    public function insert(SuppliersModel $model): int;

    public function update(SuppliersModel $model): int;

    public function get(int $id): ?SuppliersModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?SuppliersModel;
}