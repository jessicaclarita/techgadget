<?php

// Database Connection
require ('../database/DBController.php');

// Product Class
require ('../database/productDB.php');

// DBController object
$db = new DBController();

// Product object & class
$productDB = new productDB($db);

if (isset($_POST['productid'])){
   $result = $productDB->getProduct($_POST['productid']);
   echo json_encode($result);
}
?>