<?php
include dirname(__DIR__, 2) . '/core.php';
use Controllers\ProductController;

$controller = new ProductController();
echo $controller->createProduct();
