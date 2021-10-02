<?php

declare(strict_types=1);

namespace Inventory\Purchases;

interface IPurchasesService
{
    public function insert(PurchasesModel $model): int;

    public function update(PurchasesModel $model): int;

    public function get(int $id): ?PurchasesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?PurchasesModel;
}