<?php

declare(strict_types=1);

namespace Inventory\Purchases;

class PurchasesDto 
{
    public int $id;
    public int $supplierId;
    public int $productId;
    public int $numberReceived;
    public string $purchaseDate;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->supplierId = (int) ($row["supplier_id"] ?? 0);
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->numberReceived = (int) ($row["number_received"] ?? 0);
        $this->purchaseDate = $row["purchase_date"] ?? "";
    }
}