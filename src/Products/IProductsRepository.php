<?php

declare(strict_types=1);

namespace Inventory\Products;

interface IProductsRepository
{
    public function insert(ProductsDto $dto): int;

    public function update(ProductsDto $dto): int;

    public function get(int $id): ?ProductsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}