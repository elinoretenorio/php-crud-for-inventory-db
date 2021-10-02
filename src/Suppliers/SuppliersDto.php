<?php

declare(strict_types=1);

namespace Inventory\Suppliers;

class SuppliersDto 
{
    public int $id;
    public string $supplier;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->supplier = $row["supplier"] ?? "";
    }
}