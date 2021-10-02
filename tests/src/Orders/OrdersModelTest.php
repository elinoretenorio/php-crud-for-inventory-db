<?php

declare(strict_types=1);

namespace Inventory\Tests\Orders;

use PHPUnit\Framework\TestCase;
use Inventory\Orders\{ OrdersDto, OrdersModel };

class OrdersModelTest extends TestCase
{
    private array $input;
    private OrdersDto $dto;
    private OrdersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2165,
            "title" => "drive",
            "first" => "need",
            "middle" => "through",
            "last" => "maintain",
            "product_id" => 7359,
            "number_shipped" => 1678,
            "order_date" => "2021-10-02",
        ];
        $this->dto = new OrdersDto($this->input);
        $this->model = new OrdersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OrdersModel(null);

        $this->assertInstanceOf(OrdersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5213;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetTitle(): void
    {
        $this->assertEquals($this->dto->title, $this->model->getTitle());
    }

    public function testSetTitle(): void
    {
        $expected = "live";
        $model = $this->model;
        $model->setTitle($expected);

        $this->assertEquals($expected, $model->getTitle());
    }

    public function testGetFirst(): void
    {
        $this->assertEquals($this->dto->first, $this->model->getFirst());
    }

    public function testSetFirst(): void
    {
        $expected = "data";
        $model = $this->model;
        $model->setFirst($expected);

        $this->assertEquals($expected, $model->getFirst());
    }

    public function testGetMiddle(): void
    {
        $this->assertEquals($this->dto->middle, $this->model->getMiddle());
    }

    public function testSetMiddle(): void
    {
        $expected = "month";
        $model = $this->model;
        $model->setMiddle($expected);

        $this->assertEquals($expected, $model->getMiddle());
    }

    public function testGetLast(): void
    {
        $this->assertEquals($this->dto->last, $this->model->getLast());
    }

    public function testSetLast(): void
    {
        $expected = "speak";
        $model = $this->model;
        $model->setLast($expected);

        $this->assertEquals($expected, $model->getLast());
    }

    public function testGetProductId(): void
    {
        $this->assertEquals($this->dto->productId, $this->model->getProductId());
    }

    public function testSetProductId(): void
    {
        $expected = 1917;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetNumberShipped(): void
    {
        $this->assertEquals($this->dto->numberShipped, $this->model->getNumberShipped());
    }

    public function testSetNumberShipped(): void
    {
        $expected = 7996;
        $model = $this->model;
        $model->setNumberShipped($expected);

        $this->assertEquals($expected, $model->getNumberShipped());
    }

    public function testGetOrderDate(): void
    {
        $this->assertEquals($this->dto->orderDate, $this->model->getOrderDate());
    }

    public function testSetOrderDate(): void
    {
        $expected = "2021-10-01";
        $model = $this->model;
        $model->setOrderDate($expected);

        $this->assertEquals($expected, $model->getOrderDate());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}