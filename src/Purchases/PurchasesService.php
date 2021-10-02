<?php

declare(strict_types=1);

namespace Inventory\Purchases;

class PurchasesService implements IPurchasesService
{
    private IPurchasesRepository $repository;

    public function __construct(IPurchasesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(PurchasesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(PurchasesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?PurchasesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new PurchasesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var PurchasesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new PurchasesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?PurchasesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new PurchasesDto($row);

        return new PurchasesModel($dto);
    }
}