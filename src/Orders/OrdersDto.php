<?php

declare(strict_types=1);

namespace Inventory\Orders;

class OrdersDto 
{
    public int $id;
    public string $title;
    public string $first;
    public string $middle;
    public string $last;
    public int $productId;
    public int $numberShipped;
    public string $orderDate;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->first = $row["first"] ?? "";
        $this->middle = $row["middle"] ?? "";
        $this->last = $row["last"] ?? "";
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->numberShipped = (int) ($row["number_shipped"] ?? 0);
        $this->orderDate = $row["order_date"] ?? "";
    }
}