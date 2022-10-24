$(document).ready(function(){

    // Top Sale Owl Carousel
    $("#top-sale .owl-carousel").owlCarousel({
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

    // isotope method to filter the products
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',// to select the item based on its class name
        layoutMode : 'fitRows'      // to fit all the products in a row
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })


    // new phones owl carousel
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
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val() >= 1 && $input.val() <= 9){
            $input.val(function(i, oldval){
                return ++oldval;
            });
        }
    });

       // click on qty down button
       $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val() > 1 && $input.val() <= 10){
            $input.val(function(i, oldval){
                return --oldval;
            });
        }
    });


});