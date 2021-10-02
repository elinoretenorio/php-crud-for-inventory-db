<?php

declare(strict_types=1);

namespace Inventory\Tests\Products;

use PHPUnit\Framework\TestCase;
use Inventory\Database\DatabaseException;
use Inventory\Products\{ ProductsDto, IProductsRepository, ProductsRepository };

class ProductsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ProductsDto $dto;
    private IProductsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("Inventory\Database\IDatabase");
        $this->result = $this->createMock("Inventory\Database\IDatabaseResult");
        $this->input = [
            "id" => 7207,
            "product_name" => "improve",
            "part_number" => "heavy",
            "product_label" => "place",
            "starting_inventory" => 6019,
            "inventory_received" => 8870,
            "inventory_shipped" => 1786,
            "inventory_on_hand" => 4200,
            "minimum_required" => 1841,
        ];
        $this->dto = new ProductsDto($this->input);
        $this->repository = new ProductsRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 2813;

        $sql = "INSERT INTO `products` (`product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productName,
                $this->dto->partNumber,
                $this->dto->productLabel,
                $this->dto->startingInventory,
                $this->dto->inventoryReceived,
                $this->dto->inventoryShipped,
                $this->dto->inventoryOnHand,
                $this->dto->minimumRequired
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 4802;

        $sql = "UPDATE `products` SET `product_name` = ?, `part_number` = ?, `product_label` = ?, `starting_inventory` = ?, `inventory_received` = ?, `inventory_shipped` = ?, `inventory_on_hand` = ?, `minimum_required` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productName,
                $this->dto->partNumber,
                $this->dto->productLabel,
                $this->dto->startingInventory,
                $this->dto->inventoryReceived,
                $this->dto->inventoryShipped,
                $this->dto->inventoryOnHand,
                $this->dto->minimumRequired,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 5474;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7550;

        $sql = "SELECT `id`, `product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`
                FROM `products` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `product_name`, `part_number`, `product_label`, `starting_inventory`, `inventory_received`, `inventory_shipped`, `inventory_on_hand`, `minimum_required`
                FROM `products`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 4780;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 3963;
        $expected = 589;

        $sql = "DELETE FROM `products` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}