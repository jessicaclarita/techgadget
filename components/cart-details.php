        <!-- Shopping cart section  -->
        <section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-montserrat font-size-20">Shopping Cart</h5>

                <!--  shopping cart items   -->
                    <div class="row">
                        <div class="col-sm-9">
                            <!-- cart item -->
                                <div class="row border-top py-3 mt-3">
                                    <div class="col-sm-2">
                                        <img src="assets/products/1.png" style="height: 120px;" alt="cart1" class="img-fluid">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-montserrat font-size-20">Samsung Galaxy 10</h5>
                                        <small>by Samsung</small>
                                        <!-- product qty -->
                                            <div class="qty d-flex pt-2">
                                                <div class="d-flex font-raleway w-25">
                                                    <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                                    <input type="text" data-id="pro1" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                                    <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                                </div>
                                                <button type="submit" class="btn font-montserrat text-danger px-3">Delete</button>
                                            </div>
                                        <!-- !product qty -->

                                    </div>

                                    <div class="col-sm-2 text-right">
                                        <div class="font-size-20 text-danger font-montserrat">
                                            $<span class="product_price">152</span>
                                        </div>
                                    </div>
                                </div>
                            <!-- !cart item -->
                            <!-- cart item -->
                            <div class="row border-top py-3 mt-3">
                                <div class="col-sm-2">
                                    <img src="assets/products/2.png" style="height: 120px;" alt="cart1" class="img-fluid">
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-montserrat font-size-20">Samsung Galaxy 10</h5>
                                    <small>by Samsung</small>
                                    <!-- product qty -->
                                        <div class="qty d-flex pt-2">
                                            <div class="d-flex font-raleway w-25">
                                                <button class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                                <input type="text" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                                <button class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                            </div>
                                            <button type="submit" class="btn font-montserrat text-danger px-3">Delete</button>
                                        </div>
                                    <!-- !product qty -->

                                </div>

                                <div class="col-sm-2 text-right">
                                    <div class="font-size-20 text-danger font-montserrat">
                                        $<span class="product_price">152</span>
                                    </div>
                                </div>
                            </div>
                        <!-- !cart item -->
                        </div>
                        <!-- subtotal section-->
                        <div class="col-sm-3">
                            <div class="sub-total border text-center mt-2">
                                <h6 class="font-size-12 font-raleway text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                                <div class="border-top py-4">
                                    <h5 class="font-montserrat font-size-20">Subtotal (2 item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price">152.00</span> </span> </h5>
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