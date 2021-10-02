<?php

declare(strict_types=1);

namespace Inventory\Products;

interface IProductsService
{
    public function insert(ProductsModel $model): int;

    public function update(ProductsModel $model): int;

    public function get(int $id): ?ProductsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProductsModel;
}