<?php

declare(strict_types=1);

namespace Inventory\Tests\Orders;

use PHPUnit\Framework\TestCase;
use Inventory\Database\DatabaseException;
use Inventory\Orders\{ OrdersDto, IOrdersRepository, OrdersRepository };

class OrdersRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OrdersDto $dto;
    private IOrdersRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("Inventory\Database\IDatabase");
        $this->result = $this->createMock("Inventory\Database\IDatabaseResult");
        $this->input = [
            "id" => 5589,
            "title" => "data",
            "first" => "expect",
            "middle" => "themselves",
            "last" => "involve",
            "product_id" => 3472,
            "number_shipped" => 4070,
            "order_date" => "2021-10-17",
        ];
        $this->dto = new OrdersDto($this->input);
        $this->repository = new OrdersRepository($this->db);
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
        $expected = 2620;

        $sql = "INSERT INTO `orders` (`title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->title,
                $this->dto->first,
                $this->dto->middle,
                $this->dto->last,
                $this->dto->productId,
                $this->dto->numberShipped,
                $this->dto->orderDate
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
        $expected = 7601;

        $sql = "UPDATE `orders` SET `title` = ?, `first` = ?, `middle` = ?, `last` = ?, `product_id` = ?, `number_shipped` = ?, `order_date` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->title,
                $this->dto->first,
                $this->dto->middle,
                $this->dto->last,
                $this->dto->productId,
                $this->dto->numberShipped,
                $this->dto->orderDate,
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
        $id = 1405;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 1347;

        $sql = "SELECT `id`, `title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`
                FROM `orders` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `title`, `first`, `middle`, `last`, `product_id`, `number_shipped`, `order_date`
                FROM `orders`";

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
        $id = 9551;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 5125;
        $expected = 4565;

        $sql = "DELETE FROM `orders` WHERE `id` = ?";

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