<?php

declare(strict_types=1);

namespace Inventory\Products;

class ProductsDto 
{
    public int $id;
    public string $productName;
    public string $partNumber;
    public string $productLabel;
    public int $startingInventory;
    public int $inventoryReceived;
    public int $inventoryShipped;
    public int $inventoryOnHand;
    public int $minimumRequired;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->productName = $row["product_name"] ?? "";
        $this->partNumber = $row["part_number"] ?? "";
        $this->productLabel = $row["product_label"] ?? "";
        $this->startingInventory = (int) ($row["starting_inventory"] ?? 0);
        $this->inventoryReceived = (int) ($row["inventory_received"] ?? 0);
        $this->inventoryShipped = (int) ($row["inventory_shipped"] ?? 0);
        $this->inventoryOnHand = (int) ($row["inventory_on_hand"] ?? 0);
        $this->minimumRequired = (int) ($row["minimum_required"] ?? 0);
    }
}