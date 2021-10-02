<?php

declare(strict_types=1);

namespace Inventory\Products;

use JsonSerializable;

class ProductsModel implements JsonSerializable
{
    private int $id;
    private string $productName;
    private string $partNumber;
    private string $productLabel;
    private int $startingInventory;
    private int $inventoryReceived;
    private int $inventoryShipped;
    private int $inventoryOnHand;
    private int $minimumRequired;

    public function __construct(ProductsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->productName = $dto->productName;
        $this->partNumber = $dto->partNumber;
        $this->productLabel = $dto->productLabel;
        $this->startingInventory = $dto->startingInventory;
        $this->inventoryReceived = $dto->inventoryReceived;
        $this->inventoryShipped = $dto->inventoryShipped;
        $this->inventoryOnHand = $dto->inventoryOnHand;
        $this->minimumRequired = $dto->minimumRequired;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getPartNumber(): string
    {
        return $this->partNumber;
    }

    public function setPartNumber(string $partNumber): void
    {
        $this->partNumber = $partNumber;
    }

    public function getProductLabel(): string
    {
        return $this->productLabel;
    }

    public function setProductLabel(string $productLabel): void
    {
        $this->productLabel = $productLabel;
    }

    public function getStartingInventory(): int
    {
        return $this->startingInventory;
    }

    public function setStartingInventory(int $startingInventory): void
    {
        $this->startingInventory = $startingInventory;
    }

    public function getInventoryReceived(): int
    {
        return $this->inventoryReceived;
    }

    public function setInventoryReceived(int $inventoryReceived): void
    {
        $this->inventoryReceived = $inventoryReceived;
    }

    public function getInventoryShipped(): int
    {
        return $this->inventoryShipped;
    }

    public function setInventoryShipped(int $inventoryShipped): void
    {
        $this->inventoryShipped = $inventoryShipped;
    }

    public function getInventoryOnHand(): int
    {
        return $this->inventoryOnHand;
    }

    public function setInventoryOnHand(int $inventoryOnHand): void
    {
        $this->inventoryOnHand = $inventoryOnHand;
    }

    public function getMinimumRequired(): int
    {
        return $this->minimumRequired;
    }

    public function setMinimumRequired(int $minimumRequired): void
    {
        $this->minimumRequired = $minimumRequired;
    }

    public function toDto(): ProductsDto
    {
        $dto = new ProductsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->productName = $this->productName ?? "";
        $dto->partNumber = $this->partNumber ?? "";
        $dto->productLabel = $this->productLabel ?? "";
        $dto->startingInventory = (int) ($this->startingInventory ?? 0);
        $dto->inventoryReceived = (int) ($this->inventoryReceived ?? 0);
        $dto->inventoryShipped = (int) ($this->inventoryShipped ?? 0);
        $dto->inventoryOnHand = (int) ($this->inventoryOnHand ?? 0);
        $dto->minimumRequired = (int) ($this->minimumRequired ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "product_name" => $this->productName,
            "part_number" => $this->partNumber,
            "product_label" => $this->productLabel,
            "starting_inventory" => $this->startingInventory,
            "inventory_received" => $this->inventoryReceived,
            "inventory_shipped" => $this->inventoryShipped,
            "inventory_on_hand" => $this->inventoryOnHand,
            "minimum_required" => $this->minimumRequired,
        ];
    }
}