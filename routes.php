<?php

declare(strict_types=1);

$router->get("/orders", "Inventory\Orders\OrdersController::getAll");
$router->post("/orders", "Inventory\Orders\OrdersController::insert");
$router->group("/orders", function ($router) {
    $router->get("/{id:number}", "Inventory\Orders\OrdersController::get");
    $router->post("/{id:number}", "Inventory\Orders\OrdersController::update");
    $router->delete("/{id:number}", "Inventory\Orders\OrdersController::delete");
});

$router->get("/products", "Inventory\Products\ProductsController::getAll");
$router->post("/products", "Inventory\Products\ProductsController::insert");
$router->group("/products", function ($router) {
    $router->get("/{id:number}", "Inventory\Products\ProductsController::get");
    $router->post("/{id:number}", "Inventory\Products\ProductsController::update");
    $router->delete("/{id:number}", "Inventory\Products\ProductsController::delete");
});

$router->get("/purchases", "Inventory\Purchases\PurchasesController::getAll");
$router->post("/purchases", "Inventory\Purchases\PurchasesController::insert");
$router->group("/purchases", function ($router) {
    $router->get("/{id:number}", "Inventory\Purchases\PurchasesController::get");
    $router->post("/{id:number}", "Inventory\Purchases\PurchasesController::update");
    $router->delete("/{id:number}", "Inventory\Purchases\PurchasesController::delete");
});

$router->get("/suppliers", "Inventory\Suppliers\SuppliersController::getAll");
$router->post("/suppliers", "Inventory\Suppliers\SuppliersController::insert");
$router->group("/suppliers", function ($router) {
    $router->get("/{id:number}", "Inventory\Suppliers\SuppliersController::get");
    $router->post("/{id:number}", "Inventory\Suppliers\SuppliersController::update");
    $router->delete("/{id:number}", "Inventory\Suppliers\SuppliersController::delete");
});

