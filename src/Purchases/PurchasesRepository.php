<?php

declare(strict_types=1);

namespace Inventory\Purchases;

use Inventory\Database\IDatabase;
use Inventory\Database\DatabaseException;

class PurchasesRepository implements IPurchasesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(PurchasesDto $dto): int
    {
        $sql = "INSERT INTO `purchases` (`supplier_id`, `product_id`, `number_received`, `purchase_date`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->supplierId,
                $dto->productId,
                $dto->numberReceived,
                $dto->purchaseDate
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(PurchasesDto $dto): int
    {
        $sql = "UPDATE `purchases` SET `supplier_id` = ?, `product_id` = ?, `number_received` = ?, `purchase_date` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->supplierId,
                $dto->productId,
                $dto->numberReceived,
                $dto->purchaseDate,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?PurchasesDto
    {
        $sql = "SELECT `id`, `supplier_id`, `product_id`, `number_received`, `purchase_date`
                FROM `purchases` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new PurchasesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `supplier_id`, `product_id`, `number_received`, `purchase_date`
                FROM `purchases`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new PurchasesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `purchases` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}