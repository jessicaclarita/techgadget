<?php shuffle($product_data); ?>    
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
                      <a href="#"><img src="<?php echo $product['ImageURL']; ?>" alt="Product-Image" class="img-fluid"></a>
                      <div class="text-center">
                          <div class="text-wrap">
                            <h6><?php echo $product['ProductName']; ?></h6>
                          </div>
                        <div class="rating text-warning font-size-12">
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                          <span>$<?php echo $product['RetailPrice']; ?></span>
                        </div>
                        <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                <?php } // Closing foreach function?>
              </div>
              <!-- Carousel -->
      </div>
    </section>
    <!-- New Phones -->