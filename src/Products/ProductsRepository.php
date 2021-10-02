<?php

declare(strict_types=1);

namespace Inventory\Products;

use Inventory\Database\IDatabase;
use Inventory\Database\DatabaseException;

class ProductsRepository implements IProductsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ProductsDto $dto): int
    {
        $sql = "INSERT INTO `products` (`product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productName,
                $dto->partNumber,
                $dto->productLabel,
                $dto->startingInventory,
                $dto->inventoryReceived,
                $dto->inventoryShipped,
                $dto->inventoryOnHand,
                $dto->minimumRequired
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ProductsDto $dto): int
    {
        $sql = "UPDATE `products` SET `product_name` = ?, `part_number` = ?, `product_label` = ?, `starting_inventory` = ?, `inventory_received` = ?, `inventory_shipped` = ?, `inventory_on_hand` = ?, `minimum_required` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productName,
                $dto->partNumber,
                $dto->productLabel,
                $dto->startingInventory,
                $dto->inventoryReceived,
                $dto->inventoryShipped,
                $dto->inventoryOnHand,
                $dto->minimumRequired,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ProductsDto
    {
        $sql = "SELECT `id`, `product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`
                FROM `products` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ProductsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`
                FROM `products`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ProductsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `products` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}