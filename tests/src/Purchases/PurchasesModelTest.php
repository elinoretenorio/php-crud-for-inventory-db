<?php

declare(strict_types=1);

namespace Inventory\Tests\Purchases;

use PHPUnit\Framework\TestCase;
use Inventory\Purchases\{ PurchasesDto, PurchasesModel };

class PurchasesModelTest extends TestCase
{
    private array $input;
    private PurchasesDto $dto;
    private PurchasesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7221,
            "supplier_id" => 7003,
            "product_id" => 3997,
            "number_received" => 8193,
            "purchase_date" => "2021-10-09",
        ];
        $this->dto = new PurchasesDto($this->input);
        $this->model = new PurchasesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new PurchasesModel(null);

        $this->assertInstanceOf(PurchasesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2345;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetSupplierId(): void
    {
        $this->assertEquals($this->dto->supplierId, $this->model->getSupplierId());
    }

    public function testSetSupplierId(): void
    {
        $expected = 2822;
        $model = $this->model;
        $model->setSupplierId($expected);

        $this->assertEquals($expected, $model->getSupplierId());
    }

    public function testGetProductId(): void
    {
        $this->assertEquals($this->dto->productId, $this->model->getProductId());
    }

    public function testSetProductId(): void
    {
        $expected = 4078;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetNumberReceived(): void
    {
        $this->assertEquals($this->dto->numberReceived, $this->model->getNumberReceived());
    }

    public function testSetNumberReceived(): void
    {
        $expected = 5671;
        $model = $this->model;
        $model->setNumberReceived($expected);

        $this->assertEquals($expected, $model->getNumberReceived());
    }

    public function testGetPurchaseDate(): void
    {
        $this->assertEquals($this->dto->purchaseDate, $this->model->getPurchaseDate());
    }

    public function testSetPurchaseDate(): void
    {
        $expected = "2021-10-14";
        $model = $this->model;
        $model->setPurchaseDate($expected);

        $this->assertEquals($expected, $model->getPurchaseDate());
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