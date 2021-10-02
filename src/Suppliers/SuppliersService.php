<?php

declare(strict_types=1);

namespace Inventory\Suppliers;

class SuppliersService implements ISuppliersService
{
    private ISuppliersRepository $repository;

    public function __construct(ISuppliersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(SuppliersModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(SuppliersModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?SuppliersModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new SuppliersModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var SuppliersDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new SuppliersModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?SuppliersModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new SuppliersDto($row);

        return new SuppliersModel($dto);
    }
}