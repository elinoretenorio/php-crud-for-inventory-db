<?php

declare(strict_types=1);

namespace Inventory\Suppliers;

interface ISuppliersRepository
{
    public function insert(SuppliersDto $dto): int;

    public function update(SuppliersDto $dto): int;

    public function get(int $id): ?SuppliersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}