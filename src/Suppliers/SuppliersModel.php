<?php

declare(strict_types=1);

namespace Inventory\Suppliers;

use JsonSerializable;

class SuppliersModel implements JsonSerializable
{
    private int $id;
    private string $supplier;

    public function __construct(SuppliersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->supplier = $dto->supplier;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSupplier(): string
    {
        return $this->supplier;
    }

    public function setSupplier(string $supplier): void
    {
        $this->supplier = $supplier;
    }

    public function toDto(): SuppliersDto
    {
        $dto = new SuppliersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->supplier = $this->supplier ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "supplier" => $this->supplier,
        ];
    }
}