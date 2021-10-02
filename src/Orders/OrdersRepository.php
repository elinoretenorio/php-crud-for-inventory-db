<?php

declare(strict_types=1);

namespace Inventory\Orders;

use Inventory\Database\IDatabase;
use Inventory\Database\DatabaseException;

class OrdersRepository implements IOrdersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OrdersDto $dto): int
    {
        $sql = "INSERT INTO `orders` (`title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->title,
                $dto->first,
                $dto->middle,
                $dto->last,
                $dto->productId,
                $dto->numberShipped,
                $dto->orderDate
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OrdersDto $dto): int
    {
        $sql = "UPDATE `orders` SET `title` = ?, `first` = ?, `middle` = ?, `last` = ?, `product_id` = ?, `number_shipped` = ?, `order_date` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->title,
                $dto->first,
                $dto->middle,
                $dto->last,
                $dto->productId,
                $dto->numberShipped,
                $dto->orderDate,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OrdersDto
    {
        $sql = "SELECT `id`, `title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`
                FROM `orders` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OrdersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`
                FROM `orders`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OrdersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `orders` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}