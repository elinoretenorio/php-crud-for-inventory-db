<?php

declare(strict_types=1);

namespace Inventory\Tests\Suppliers;

use PHPUnit\Framework\TestCase;
use Inventory\Suppliers\{ SuppliersDto, SuppliersModel };

class SuppliersModelTest extends TestCase
{
    private array $input;
    private SuppliersDto $dto;
    private SuppliersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4991,
            "supplier" => "serve",
        ];
        $this->dto = new SuppliersDto($this->input);
        $this->model = new SuppliersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SuppliersModel(null);

        $this->assertInstanceOf(SuppliersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4606;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetSupplier(): void
    {
        $this->assertEquals($this->dto->supplier, $this->model->getSupplier());
    }

    public function testSetSupplier(): void
    {
        $expected = "possible";
        $model = $this->model;
        $model->setSupplier($expected);

        $this->assertEquals($expected, $model->getSupplier());
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