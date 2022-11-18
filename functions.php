<?php

// Database Connection
require ('database/DBController.php');

// Product Class
require ('database/productDB.php');

// Cart Class
require ('database/cartDB.php');


// DBController object
$db = new DBController();

// Product object & class
$productDB = new productDB($db);
$product_data = $productDB->getData();

// Cart object & class
$cartDB = new cartDB($db);
