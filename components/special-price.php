<?php
  $brand = array_map(function ($item){return $item['Brand'];}, $product_data);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_data);
?>    
    <!-- Special Price -->
    <section id="special-price">
      <div class="container">
        <div id="filters" class="button-group text-center font-montserrat font-size-16">
          <button class="btn is-checked" data-filter="*">All Brands</button>
          <?php
          array_map(function($brand){
            printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
          }, $unique);
          ?>
        </div>

        <div class="grid">
          <?php array_map(function ($product){?>
          <div class="grid-item border <?php echo $product['Brand']; ?>">
        
           <div class="item py-2" style="width: 200px;">
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
          </div>
          <?php }, $product_data) // Closing array_map function?>
        </div>
    </section>
    <!-- Special Price -->