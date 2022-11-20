<?php 
    $product_id = $_GET['product_id'];
    foreach($productDB->getData() as $product):
        if($product['BarcodeNo'] == $product_id):

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['product_details_submit'])){
                  // call addToCart method
                  $cartDB->addToCart($_POST['customer_id'], $_POST['product_id']);
                }
              }
?>
        <!-- Product Details -->
        <section id="product">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 pt-5 mt-5">
                            <img src="<?php echo $product['ImageURL']; ?>" alt="product" class="img-fluid">
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-montserrat font-size-20"><?php echo $product['ProductName']; ?></h5>
                            <small>by <?php echo $product['Brand']; ?></small>
                            
                            <hr class="mb-1">

                            <!-- Product Price -->
                                    <div class="font-raleway my-2">
                                        <div class="font-size-14">Price per item:</td><span class="font-size-20"> $<?php echo $product['RetailPrice']; ?></span><small class="text-dark font-size-14">&nbsp;&nbsp;( Inclusive of all taxes )</small></td></div>
                                        <div class="font-size-14 text-primary">Save 20% by purchasing more than 10 items</div>
                                    </div>
                            <!-- Product Price -->

                             <!-- Product Policy -->
                                <div id="policy">
                                    <div class="d-flex">
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                            </div>
                                            <span class="font-raleway font-size-14">10 Days <br> Replacement</span>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                            </div>
                                            <span class="font-raleway font-size-14">Fast <br>Delivery</span>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                            </div>
                                            <span class="font-raleway font-size-14"><?php echo $product['Warranty']; ?> Year(s) <br>Warranty</span>
                                        </div>
                                    </div>
                                </div>
                              <!-- Product Policy -->
                                <hr>

                             <div class="row">
                            
                                 <div class="col-6">
                                   <!-- Product Quantity -->  
                                     <div class="qty d-flex">
                                         <h6 class="font-montserrat">Quantity</h6>
                                         <div class="px-4 d-flex font-raleway">
                                             <button data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                             <input type="text" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>" class="qty_input border px-4 w-50 bg-light" disabled value="1" placeholder="1">
                                             <button class="qty-up border bg-light" data-id="<?php echo $product['BarcodeNo'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                         </div>
                                     </div>
                                    <!-- Product Quantity -->  
                                 </div>
                             </div>

                            <!-- Buy & Cart Buttons -->
                             <div class="row">
                                <div class="col">
                                    <div class="form-row pt-4 font-size-16 font-montserrat">
                                        <div class="col">
                                            <?php
                                                if ($product['Quantity'] > 0){
                                                    if (in_array($product['BarcodeNo'], $cartDB->getCartId($productDB->getData('shoppingcart')) ?? [])){
                                                        echo '<button type="submit" disabled class="btn btn-secondary form-control">In the Cart</button>';
                                                    } else {
                                                      echo '<button type="submit" name="all_products_submit" class="btn color-second-bg form-control">Add to Cart</button>';
                                                    }
                                                } else {
                                                      echo '<button type="submit" disabled class="btn btn-secondary form-control">Out of Stock</button>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col">
                                            <form method="post">
                                                <input type="hidden" name="customer_id" value="<?php echo $_SESSION["id"]; ?>">
                                                <input type="hidden" name="product_id" value="<?php echo $product['BarcodeNo'] ?? '1'; ?>">
                                                <button type="submit" class="btn btn-primary form-control">Proceed to Buy</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <!-- Buy & Cart Buttons -->
                        </div>

                        <div class="col-12 mt-3">
                            <h6 class="font-nunito font-size-20">Product Details</h6>
                            <hr>
                            <p class="font-raleway font-size-14"><?php echo $product['Details']; ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <!-- Product Details -->
<?php
    endif;
    endforeach;
?>        