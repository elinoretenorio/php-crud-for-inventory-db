<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", Inventory\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Orders

$container->add("OrdersRepository", Inventory\Orders\OrdersRepository::class)
    ->addArgument("Database");
$container->add("OrdersService", Inventory\Orders\OrdersService::class)
    ->addArgument("OrdersRepository");
$container->add(Inventory\Orders\OrdersController::class)
    ->addArgument("OrdersService");

// Products

$container->add("ProductsRepository", Inventory\Products\ProductsRepository::class)
    ->addArgument("Database");
$container->add("ProductsService", Inventory\Products\ProductsService::class)
    ->addArgument("ProductsRepository");
$container->add(Inventory\Products\ProductsController::class)
    ->addArgument("ProductsService");

// Purchases

$container->add("PurchasesRepository", Inventory\Purchases\PurchasesRepository::class)
    ->addArgument("Database");
$container->add("PurchasesService", Inventory\Purchases\PurchasesService::class)
    ->addArgument("PurchasesRepository");
$container->add(Inventory\Purchases\PurchasesController::class)
    ->addArgument("PurchasesService");

// Suppliers

$container->add("SuppliersRepository", Inventory\Suppliers\SuppliersRepository::class)
    ->addArgument("Database");
$container->add("SuppliersService", Inventory\Suppliers\SuppliersService::class)
    ->addArgument("SuppliersRepository");
$container->add(Inventory\Suppliers\SuppliersController::class)
    ->addArgument("SuppliersService");

