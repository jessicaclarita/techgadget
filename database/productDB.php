<?php

// To fetch product data
class productDB
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // Get all product data
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $product;
        }

        return $resultArray;
    }

    // Get all product data using barcode no
    public function getProduct($product_id = null, $table= 'product'){
        if (isset($product_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE BarcodeNo={$product_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $product;
            }

            return $resultArray;
        }
    }

}