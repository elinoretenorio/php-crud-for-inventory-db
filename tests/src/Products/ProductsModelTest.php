<?php

declare(strict_types=1);

namespace Inventory\Tests\Products;

use PHPUnit\Framework\TestCase;
use Inventory\Products\{ ProductsDto, ProductsModel };

class ProductsModelTest extends TestCase
{
    private array $input;
    private ProductsDto $dto;
    private ProductsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6769,
            "product_name" => "law",
            "part_number" => "at",
            "product_label" => "sort",
            "starting_inventory" => 9461,
            "inventory_received" => 6906,
            "inventory_shipped" => 4516,
            "inventory_on_hand" => 1965,
            "minimum_required" => 5578,
        ];
        $this->dto = new ProductsDto($this->input);
        $this->model = new ProductsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProductsModel(null);

        $this->assertInstanceOf(ProductsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 775;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetProductName(): void
    {
        $this->assertEquals($this->dto->productName, $this->model->getProductName());
    }

    public function testSetProductName(): void
    {
        $expected = "choose";
        $model = $this->model;
        $model->setProductName($expected);

        $this->assertEquals($expected, $model->getProductName());
    }

    public function testGetPartNumber(): void
    {
        $this->assertEquals($this->dto->partNumber, $this->model->getPartNumber());
    }

    public function testSetPartNumber(): void
    {
        $expected = "beyond";
        $model = $this->model;
        $model->setPartNumber($expected);

        $this->assertEquals($expected, $model->getPartNumber());
    }

    public function testGetProductLabel(): void
    {
        $this->assertEquals($this->dto->productLabel, $this->model->getProductLabel());
    }

    public function testSetProductLabel(): void
    {
        $expected = "economic";
        $model = $this->model;
        $model->setProductLabel($expected);

        $this->assertEquals($expected, $model->getProductLabel());
    }

    public function testGetStartingInventory(): void
    {
        $this->assertEquals($this->dto->startingInventory, $this->model->getStartingInventory());
    }

    public function testSetStartingInventory(): void
    {
        $expected = 4083;
        $model = $this->model;
        $model->setStartingInventory($expected);

        $this->assertEquals($expected, $model->getStartingInventory());
    }

    public function testGetInventoryReceived(): void
    {
        $this->assertEquals($this->dto->inventoryReceived, $this->model->getInventoryReceived());
    }

    public function testSetInventoryReceived(): void
    {
        $expected = 1569;
        $model = $this->model;
        $model->setInventoryReceived($expected);

        $this->assertEquals($expected, $model->getInventoryReceived());
    }

    public function testGetInventoryShipped(): void
    {
        $this->assertEquals($this->dto->inventoryShipped, $this->model->getInventoryShipped());
    }

    public function testSetInventoryShipped(): void
    {
        $expected = 4610;
        $model = $this->model;
        $model->setInventoryShipped($expected);

        $this->assertEquals($expected, $model->getInventoryShipped());
    }

    public function testGetInventoryOnHand(): void
    {
        $this->assertEquals($this->dto->inventoryOnHand, $this->model->getInventoryOnHand());
    }

    public function testSetInventoryOnHand(): void
    {
        $expected = 5265;
        $model = $this->model;
        $model->setInventoryOnHand($expected);

        $this->assertEquals($expected, $model->getInventoryOnHand());
    }

    public function testGetMinimumRequired(): void
    {
        $this->assertEquals($this->dto->minimumRequired, $this->model->getMinimumRequired());
    }

    public function testSetMinimumRequired(): void
    {
        $expected = 4911;
        $model = $this->model;
        $model->setMinimumRequired($expected);

        $this->assertEquals($expected, $model->getMinimumRequired());
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