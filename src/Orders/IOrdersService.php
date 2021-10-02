<?php

declare(strict_types=1);

namespace Inventory\Orders;

interface IOrdersService
{
    public function insert(OrdersModel $model): int;

    public function update(OrdersModel $model): int;

    public function get(int $id): ?OrdersModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OrdersModel;
}