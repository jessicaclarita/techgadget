<?php

// Database Connection
require ('database/DBController.php');

// Product Class
require ('database/productDB.php');

// Cart Class
require ('database/cartDB.php');


// DBController object
$db = new DBController();

// Product object
$productDB = new Product($db);

// Cart object
$cartDB = new Cart($db);

$product_data = $productDB->getData();

