<?php 
ob_start();
//Header
include('components/header.php'); 
?>

<!-- Main Site -->
<main id="main-site" class="position-relative pt-md-4  mt-md-4">

<?php
// Banner Carousel
include('components/banner-carousel.php');

// All Products
include('components/all-products.php');

// All Brands
include('components/all-brands.php');

// New Products
include('components/new-products.php');
?>

</main>
<!-- Main Site -->

<?php 
//Footer
include('components/footer.php'); 
?>