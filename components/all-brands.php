<?php
  $brand = array_map(function ($item){return $item['Brand'];}, $product_data);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_data);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['all_brands_submit'])){
      // call addToCart method
      $cartDB->addToCart($_POST['customer_id'], $_POST['product_id']);
    }
  }

  $in_cart = $cartDB->getCartId($productDB->getData('shoppingcart'));
?>    
    <!-- All Brands -->
    <section id="all-brands">
      <div class="container">
        <div id="filters" class="button-group text-center font-montserrat">
          <button class="btn is-checked" data-filter="*">All Brands</button>
          <?php
          array_map(function($brand){
            printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
          }, $unique);
          ?>
        </div>

        <div class="grid">
          <?php array_map(function ($product) use($in_cart){?>
          <div class="grid-item border <?php echo $product['Brand']; ?>">
        
           <div class="item py-2" style="width: 200px;">
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
                  <span>$<?php echo $product['RetailPrice']; ?></span>
                </div>
                  <form method="post">
                    <input type="hidden" name="customer_id" value="<?php echo $_SESSION["id"]; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product['BarcodeNo'] ?? '1'; ?>">
                      <?php
                        if ($product['Quantity'] > 0){
                          if (in_array($product['BarcodeNo'], $in_cart ?? [])){
                            echo '<button type="submit" disabled class="btn btn-secondary font-size-12">In the Cart</button>';
                          } else {
                            echo '<button type="submit" name="all_brands_submit" class="btn color-second-bg font-size-12">Add to Cart</button>';
                          }
                        } else {
                          echo '<button type="submit" disabled class="btn btn-secondary font-size-12">Out of Stock</button>';
                        }
                      ?>
                  </form>
              </div>
            </div>
          </div>
          </div>
          <?php }, $product_data) // Closing array_map function?>
        </div>
    </section>
    <!-- All Brands -->