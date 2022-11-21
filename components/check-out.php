<?php 
include('database/checkoutDB.php');
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deleted_record = $cartDB->deleteCart($_POST['product_id']);
        }
    }
?>

<div class="container well">
    <center><h2 style="margin: 50px">Payment Page</h2></center>
    <div class="row">
      <div class="col-md-7 well">
        <h3>Billing Address</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <p style='margin-top: 15px'>Transaction No</p>
            <input class="form-control" style='margin: 10px' type="text" id="transaction" name="transaction" value=<?php echo(mt_getrandmax()); ?> /> 
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <p style='margin-top: 15px'>Payment Method</p>
            <input class="form-control" style='margin: 10px' type="text" id="payment" name="payment" placeholder="Credit Card">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <p style='margin-top: 15px'>Credit Number</p>
            <input class="form-control" style='margin: 10px' type="text" name="creditnum">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <p style='margin-top: 15px'>
              Date
              <script type="text/javascript">
              
              var currentTime = new Date()
              var month = currentTime.getMonth() + 1
              var day = currentTime.getDate()
              var year = currentTime.getFullYear()
              document.write(month + "-" + day + "-" + year )

              var currentTime = new Date()
              var hours = currentTime.getHours()
              var minutes = currentTime.getMinutes()
              if (minutes < 10){
              minutes = "0" + minutes
              }
              document.write("    " + hours + ":" + minutes + " ")
              if(hours > 11){
              document.write("PM")
              } else {
              document.write("AM")
              }
              
              </script>
            </p>
          </div>
        </div>

        <h3 style='margin-top: 10px'>Shipping Address</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <p style='margin-top: 15px'>Street</p>
            <input class="form-control" type="text" style='margin: 10px' id="street" name="street" >
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-envelope"></span>
            </div>
            <p style='margin-top: 15px'>City</p>
            <input class="form-control" type="text" style='margin: 10px' id="city" name="city">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <p style='margin-top: 15px'>State</p>
            <input class="form-control" type="text" style='margin: 10px' id="state" name="state" >
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <p style='margin-top: 15px'>ZipCode</p>
            <input class="form-control" type="text" style='margin: 10px' id="zipcode" name="zipcode" >
          </div>
        </div>

      </div>

      <section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-montserrat font-size-20">Shopping Cart</h5>
            
            <div class="row">
                <!-- Cart Items -->
                <div class="col-sm-9">
                    <?php
                        foreach ($productDB->getData('shoppingcart') as $product):
                        $cart_data = $productDB->getProduct($product['BarcodeNo']);
                        $subTotal[] = array_map(function($product){
                    ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $product['ImageURL']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-montserrat font-size-20"><?php echo $product['ProductName']; ?></h5>
                                <small>by <?php echo $product['Brand']; ?></small>
                                <!-- product qty -->
                                    <div class="qty d-flex pt-2">
                                        <div class="d-flex font-raleway w-25">
                                            <button class="qty-down border bg-light" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
                                            <input type="text" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                            <button class="qty-up border bg-light" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                        </div>
                                        <form method="post">
                                            <input type="hidden" value="<?php echo $product['BarcodeNo'] ?? 0; ?>" name="product_id">
                                            <button type="submit" name="delete-cart-submit" class="btn font-montserrat text-danger px-3">Delete</button>
                                        </form>
                                    </div>
                                <!-- !product qty -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-montserrat">
                                    <span class="product_price" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>">$<?php echo $product['RetailPrice'] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                    
                    <?php
                        return $product['RetailPrice'];
                        }, $cart_data); // closing array_map function
                        endforeach; // closing foreach function
                    ?>
                </div>
                <!-- Cart Items -->
                
                <!-- !subtotal section-->
            </div>
        <!--  !shopping cart items   -->
    </div>
</section>

<!-- subtotal section-->
<div class="col-sm-3">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-size-12 font-raleway text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                        <div class="border-top py-4">
                            <h5 class="font-montserrat font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal) : 0; ?> item(s)):&nbsp; <span class="text-danger">
                                $<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cartDB->getSum($subTotal) : 0; ?></span> </span> </h5>
                                <?php 
                                echo '<form method="POST" action="Receipt.php">
                                <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                                </form>';
                                ?>
                            
                        </div>
                    </div>
                </div>


    </div>
  </form>
</div>
