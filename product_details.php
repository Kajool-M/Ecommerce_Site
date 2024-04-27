<!-- connect file-->
<?php
include('includes/connect.php');    // no . and \ coz they are in the same level
  // include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--font aswsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- css file-->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
<!-- first header-->
 <nav class="navbar navbar-expand-lg navbar-light bg-warning">
   <div class="container-fluid">
     <img src="./images/logo.jpg" alt="" class="logo">  <!-- one . coz in root and 2 . coz in admin and we have to come outside of that folder -->           
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span>
    </button>   <!-- when inspection is done than the 3lines should show all the list given bellow-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="E.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="#">Total Product: <?php total_cart_price();?></a>
        </li>        
      </ul>
    <form class="d-flex" action="search_product.php"  method="get">
        <input type="text" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">  <!-- type=search so that the textt disappes-->
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- second header-->
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
  <ul class="navbar-nav me-auto">

  <?php
          if(!isset($_SESSION['username'])){
            echo"<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome</a> </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a> </li>";
          }
      if(!isset($_SESSION['username'])){
        echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a> </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a> </li>";
      }
    ?>
  </ul>
</nav>

<!-- third header-->
<div class="bg-light">
  <h3 class="text-center">TechStore</h3>
  <p class="text-center">Happy Shopping</p>
</div>

<!-- fourth header-->
<div class="row">
  <div class="col md-10">
  <div class="col md-2">

<!-- products-->
<div class="row">       <!-- dislay is horizental row and there will be 12 cartd-->
<!-- 
    <div class="col-md-4">
        card
        <div class='card'>
                <img src='./images/bag.jpg'  class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <a href='#' class='btn btn-primary'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
                   </div>
        </div>
    </div> 

     <div class="col-md-8">
        realted images
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-info mb-5">Related products</h1>
            </div>
            <div class="col-md-6">
            <img src='./images/bag1.jpg' class='card-img-top' alt='$product_title'>
            </div>
            <div class="col-md-6">
            <img src='./images/bag3.jpg' class='card-img-top' alt='$product_title'>
            </div>
        </div>
    </div> -->

    
     <!-- fetching products   for dymanic data  here data of db is shown in front page-->
     <?php
     //calling function
     view_details();
     get_unique_categories();
     get_unique_brands();
     
     ?>
      
<!-- row end-->
</div> 
<!-- col end-->
  </div>
  </div>


<div class="col-md-2 bg-dark p-0">
  <!-- brands to be displayed-->
     <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-warning">
          <a href="#" class="nav-link text-light"><h4>Delivery Brands</h1></a>
        </li>

        <?php
        getbrands();
                        
         ?>

       
      </ul>
  <!-- categories to be displayed-->
     <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-warning">
          <a href="#" class="nav-link text-light"><h4>Categories</h1></a>
        </li>

        <?php
        getcategories();
                      
         ?>
      
      </ul>
</div>

</div>


<!-- footer-->
    <!-- <div class="bg-info p-3 text-center">
        <p> All rights reserver copyright- Designed by Ecom-2023</p>
    </div> -->
    <!-- include footer-->
    <?php 
          include("./includes/footer.php")
          ?>

</div>

<!--bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>