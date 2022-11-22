<?php 
ob_start();
//Header
include('components/header.php'); 
?>

<!-- start #main-site -->
<main id="main-site" class="position-relative pt-md-5 mt-md-5">

<?php 
// Receipt
include('components/receipt.php');
?>

</main>
<!-- !start #main-site -->

<?php 
//Footer
include('components/footer.php'); 
?>