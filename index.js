$(document).ready(function(){

    // All Products Owl Carousel
    $("#all-products .owl-carousel").owlCarousel({
        loop: true,               // repeat the products
        nav: true,                // show the navigation buttons
        dots: false,              // hide the dots
        slideBy: 2,               // slide by 2 items
        margin: 10,
        autoplay: true,           // auto slide
        autoplayTimeout: 3000,    // auto slide every 3 seconds
        autoplayHoverPause: true, // pause auto slide when item is hovered
        responsive : {
            0: {
                items: 3          // show 3 items when the pixel >= 0
            },
            600: {
                items: 4          // show 4 items when the pixel >= 600
            },
            1000 : {
                items: 5          // show 5 items when the pixel >= 1000
            }
        }
    });

    // Isotope Method to Filter the Products
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',// to select the item based on its class name
        layoutMode : 'fitRows'      // to fit all the products in a row
    });

    // Filter Items on Button Click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })


    // New Products Owl Carousel
    $("#new-products .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });


    // product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url : "components/ajax.php", type : 'post', data : {productid : $(this).data("id")}, success : function (result) {
            let obj = JSON.parse(result);
            let product_price = obj[0]['RetailPrice'];

            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i, oldval){
                    return ++oldval;
                });

                // increase price of the product
                $price.text(parseInt(product_price * $input.val()).toFixed(2));
                
                // set subtotal price
                let subtotal = parseInt($deal_price.text()) + parseInt(product_price);
                $deal_price.text(subtotal.toFixed(2));
            } 
        }}); // closing ajax request
    });

       // click on qty down button
       $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url : "components/ajax.php", type : 'post', data : {productid : $(this).data("id")}, success : function (result) {
            let obj = JSON.parse(result);
            let product_price = obj[0]['RetailPrice'];

            if($input.val() > 1 && $input.val() <= 10){
                $input.val(function(i, oldval){
                    return --oldval;
                });

                // increase price of the product
                $price.text(parseInt(product_price * $input.val()).toFixed(2));
                
                // set subtotal price
                let subtotal = parseInt($deal_price.text()) - parseInt(product_price);
                $deal_price.text(subtotal.toFixed(2));
            }
        }}); // closing ajax request
    });
});