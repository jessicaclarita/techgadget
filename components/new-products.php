<?php 
  shuffle($product_data);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['new_products_submit'])){
      // call addToCart method
      $cartDB->addToCart($_POST['customer_id'], $_POST['product_id']);
    }
  }
?>
    <!-- New Phones -->
    <section id="new-products">
      <div class="container my-5">
        <h4 class="font-nunito">New Products</h4>
        <hr>

              <!-- Carousel -->
              <div class="owl-carousel owl-theme">
                <?php foreach ($product_data as $product) { ?>
                  <div class="item py-2">
                    <div class="product font-raleway">
                      <a href="<?php printf('%s?product_id=%s', 'Product.php', $product['BarcodeNo']) ?>">
                        <img src="<?php echo $product['ImageURL']; ?>" alt="Product-Image" class="img-fluid">
                      </a>
                        <div class="text-center">
                          <div class="text-wrap">
                            <h6><?php echo $product['ProductName']; ?></h6>
                          </div>
                        <div class="rating color-second font-size-12">
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                          <span>$<?php echo $product['RetailPrice'] ?? '0'; ?></span>
                        </div>
                          <form method="post">
                            <input type="hidden" name="customer_id" value="<?php echo 1/*$product['CustomerID']*/; ?>">
                            <input type="hidden" name="product_id" value="<?php echo $product['BarcodeNo'] ?? '1'; ?>">
                            <?php
                              if (in_array($product['BarcodeNo'], $cartDB->getCartId($productDB->getData('shoppingcart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-secondary font-size-12">In the Cart</button>';
                              } else {
                                echo '<button type="submit" name="new_products_submit" class="btn color-second-bg font-size-12">Add to Cart</button>';
                              }
                            ?>
                          </form>
                      </div>
                    </div>
                  </div>
                <?php } // Closing foreach function?>
              </div>
              <!-- Carousel -->
      </div>
    </section>
    <!-- New Phones -->