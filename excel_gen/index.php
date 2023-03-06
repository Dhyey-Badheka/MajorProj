<?php

use Phppot\Product;

require_once __DIR__ . '/class/Product.php';

$product = new Product();
$productResults = $product->getAllProduct();

require_once "./product-list.php";
