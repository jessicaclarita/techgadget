<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deleted_record = $cartDB->deleteCart($_POST['product_id']);
        }
    }
?>        
        <!-- Shopping cart section  -->
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
                                        <img src="<?php echo $product['ImageURL']; ?>" alt="cart-img" class="img-fluid">
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

                        <!-- subtotal section-->
                        <div class="col-sm-3">
                            <div class="sub-total border text-center mt-2">
                                <h6 class="font-size-12 font-raleway text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                                <div class="border-top py-4">
                                    <h5 class="font-montserrat font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal) : 0; ?> item(s)):&nbsp; <span class="text-danger">
                                        $<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cartDB->getSum($subTotal) : 0; ?></span> </span> </h5>
                                    <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                                </div>
                            </div>
                        </div>
                        <!-- !subtotal section-->
                    </div>
                <!--  !shopping cart items   -->
            </div>
        </section>
        <!-- !Shopping cart section  -->