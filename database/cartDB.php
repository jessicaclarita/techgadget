<?php

// To fetch cart data
class cartDB
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // Insert data into shopping cart's table
    public function insertIntoCart($params = null, $table = "shoppingcart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // Get customer_id and product_id and insert into cart table
    public  function addToCart($customer_id, $product_id){
        // Get customer_id and product_id
        if (isset($customer_id) && isset($product_id)){
            $params = array(
                "CustomerID" => $customer_id,
                "BarcodeNo" => $product_id
            );

            // Insert data into cart table
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // Delete cart items using cart's product's barcodeno
    public function deleteCart($product_id = null, $table = 'shoppingcart'){
        if($product_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE BarcodeNo={$product_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // Calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $product){
                $sum += floatval($product[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // Get product's BarcodeNo of shopping cart list
    public function getCartId($cartArray = null, $key = "BarcodeNo"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Pay
/*     public function pay($product_id = null, $toTable = "invoice", $fromTable = "cart"){
        if ($product_id != null){
            $query = "INSERT INTO {$toTable} SELECT * FROM {$fromTable} WHERE BarcodeNo={$product_id};";
            $query .= "DELETE FROM {$fromTable} WHERE BarcodeNo={$product_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    } */
}