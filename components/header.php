<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
    //get the file path
    $file = basename($_SERVER['PHP_SELF']);

    //remove the file extension from the file name
    $filename = basename($file,".php");

    //capitalise first letter
    $title =  ucfirst($filename);
    
    //display the page title
    echo "<title>Tech Gadget - $title Page</title>"; 
    ?>

    <!-- Title Icon -->
    <link rel="icon" href="assets/logo_free-file.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- OwlCarousel2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

    <?php
      // Database Functions
      require('functions.php')
    ?>
    
</head>
<body>

    <!-- Header -->
    <header id="header" class="fixed-top">
      <div class="strip d-flex justify-content-between px-4 py-1 color-second-bg">
          <p class="font-montserrat font-weight-bold font-size-14 text-black-50 m-0">302CEM Group 5 Website</p>
          <div class="font-raleway font-size-14">
              <a href="#" class="px-3 border-right border-left border-secondary text-dark">Login</a>
              <a href="Cart.php" class="px-3 border-right border-secondary text-dark"><i class="pr-2 fas fa-shopping-cart"></i>Cart (<?php echo count($productDB->getData('shoppingcart')); ?>)</a>
          </div>
      </div>

      <!-- Navigation Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/logo_free-file.png" width="30" height="30" class="d-inline-block align-top" alt=""> Tech Gadget</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav m-auto font-size-20">
                <li class="nav-item">
                  <a class="nav-link" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Home.php">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Warranty</a>
                </li>
                <!-- Products Button -->
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Laptops</a></li>
                    <li><a class="dropdown-item" href="#">Monitor</a></li>
                    <li><a class="dropdown-item" href="#">Processor</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">RAM</a></li>
                    <li><a class="dropdown-item" href="#">GPU</a></li>
                    <li><a class="dropdown-item" href="#">External Hard Disk</a></li>
                    <li><a class="dropdown-item" href="#">Accessories</a></li>
                  </ul>
                </li> -->
              </ul>
              <!-- Search Form -->
              <!-- <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light mx-2 my-2 my-sm-0" type="submit">Search</button>
              </form> -->
            </div>
          </div>
        </nav>
        <!-- Navigation Bar -->
    
    </header>
    <!-- Header -->