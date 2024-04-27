<!-- connect file-->
<?php
include('../includes/connect.php');  
session_start();  //if not sctive then redirect to loginpage
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper Website-Checkout page</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--font aswsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
<!-- first header-->
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
   <div class="container-fluid">
     <!-- <img src="./images/logo.jpg" alt="" class="logo">  one . coz in root and 2 . coz in admin and we have to come outside of that folder            -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span>
    </button>   <!-- when inspection is done than the 3lines should show all the list given bellow-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../E.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="User_registration.php">Register</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>   -->
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
<nav class="navbar navbar-expand-lg navbar-dark  bg-secondary">
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
        <a class='nav-link' href='./user_login.php'>Login</a> </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a> </li>";
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
  <div class="col-md-12">
  <div class="col-md-2">

<!-- products-->   <!-- hello-->
<div class="row">      
    <?php
    //  either goto login or payment session
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }else{
        include('payment.php');
      }
      ?>
      <!-- row end-->
</div> 
<!-- col end-->
  </div> 
  </div>

</div>

</div>


    <!-- include footer-->
    <?php 
          include("../includes/footer.php")
          ?>

</div>

<!--bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>