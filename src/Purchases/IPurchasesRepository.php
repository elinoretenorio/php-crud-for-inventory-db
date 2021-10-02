<?php

declare(strict_types=1);

namespace Inventory\Purchases;

interface IPurchasesRepository
{
    public function insert(PurchasesDto $dto): int;

    public function update(PurchasesDto $dto): int;

    public function get(int $id): ?PurchasesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}