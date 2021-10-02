<?php

declare(strict_types=1);

namespace Inventory\Orders;

interface IOrdersRepository
{
    public function insert(OrdersDto $dto): int;

    public function update(OrdersDto $dto): int;

    public function get(int $id): ?OrdersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}