<?php

declare(strict_types=1);

namespace Inventory\Purchases;

use JsonSerializable;

class PurchasesModel implements JsonSerializable
{
    private int $id;
    private int $supplierId;
    private int $productId;
    private int $numberReceived;
    private string $purchaseDate;

    public function __construct(PurchasesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->supplierId = $dto->supplierId;
        $this->productId = $dto->productId;
        $this->numberReceived = $dto->numberReceived;
        $this->purchaseDate = $dto->purchaseDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getNumberReceived(): int
    {
        return $this->numberReceived;
    }

    public function setNumberReceived(int $numberReceived): void
    {
        $this->numberReceived = $numberReceived;
    }

    public function getPurchaseDate(): string
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(string $purchaseDate): void
    {
        $this->purchaseDate = $purchaseDate;
    }

    public function toDto(): PurchasesDto
    {
        $dto = new PurchasesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->supplierId = (int) ($this->supplierId ?? 0);
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->numberReceived = (int) ($this->numberReceived ?? 0);
        $dto->purchaseDate = $this->purchaseDate ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "supplier_id" => $this->supplierId,
            "product_id" => $this->productId,
            "number_received" => $this->numberReceived,
            "purchase_date" => $this->purchaseDate,
        ];
    }
}