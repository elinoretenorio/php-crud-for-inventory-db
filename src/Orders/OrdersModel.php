<?php

declare(strict_types=1);

namespace Inventory\Orders;

use JsonSerializable;

class OrdersModel implements JsonSerializable
{
    private int $id;
    private string $title;
    private string $first;
    private string $middle;
    private string $last;
    private int $productId;
    private int $numberShipped;
    private string $orderDate;

    public function __construct(OrdersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->title = $dto->title;
        $this->first = $dto->first;
        $this->middle = $dto->middle;
        $this->last = $dto->last;
        $this->productId = $dto->productId;
        $this->numberShipped = $dto->numberShipped;
        $this->orderDate = $dto->orderDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function setFirst(string $first): void
    {
        $this->first = $first;
    }

    public function getMiddle(): string
    {
        return $this->middle;
    }

    public function setMiddle(string $middle): void
    {
        $this->middle = $middle;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function setLast(string $last): void
    {
        $this->last = $last;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getNumberShipped(): int
    {
        return $this->numberShipped;
    }

    public function setNumberShipped(int $numberShipped): void
    {
        $this->numberShipped = $numberShipped;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    public function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    public function toDto(): OrdersDto
    {
        $dto = new OrdersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->title = $this->title ?? "";
        $dto->first = $this->first ?? "";
        $dto->middle = $this->middle ?? "";
        $dto->last = $this->last ?? "";
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->numberShipped = (int) ($this->numberShipped ?? 0);
        $dto->orderDate = $this->orderDate ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "first" => $this->first,
            "middle" => $this->middle,
            "last" => $this->last,
            "product_id" => $this->productId,
            "number_shipped" => $this->numberShipped,
            "order_date" => $this->orderDate,
        ];
    }
}