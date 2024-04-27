<?php
// including connect file
// include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;          //to connect with db

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            // if category and brand not set then only we have to display this data
            $select_query="Select *from `products` order by rand() LIMIT 0,4";
        $result_query=mysqli_query($con,$select_query);
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while( $row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              // $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "       <div class='col-md-4' mb-2>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: Rs.$product_price</p>
                      <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
                   </div>
             </div>
         </div> ";
        }
}
}
}

//getting all products
function get_all_products(){
    global $con;
    //condition to check isset or not   or categories data from db
    if(!isset($_GET['category'])){
        // $category_id=$_GET['brand'];
    // if category and brand not set then only we have to display this data
    $select_query="Select * from `products` order by rand() ";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger's>No stock for this category.</h2>";
}
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while( $row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      // $product_keywords=$row['product_keywords'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "       <div class='col-md-4' mb-2>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: Rs.$product_price</p>
              <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
           </div>
     </div>
 </div> ";
}
}
}



//getting unique categories
function get_unique_categories(){
    global $con;          //to connect with db

    //condition to check isset or not   or categories data from db
    if(isset($_GET['category'])){
                $category_id=$_GET['category'];
            // if category and brand not set then only we have to display this data
            $select_query="Select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger's>No stock for this category.</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while( $row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              // $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "       <div class='col-md-4' mb-2>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: Rs.$product_price</p>
                      <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
                   </div>
             </div>
         </div> ";
        }
}
}


//getting unique brands
function get_unique_brands(){
    global $con;          //to connect with db

    //condition to check isset or not   or categories data from db
    if(isset($_GET['brand'])){
                $brand_id=$_GET['brand'];
            // if category and brand not set then only we have to display this data
            $select_query="Select * from `products` where brand_id=$brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger's>This brand is not available for service.</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while( $row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              // $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "       <div class='col-md-4' mb-2>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: Rs.$product_price</p>
                      <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
                   </div>
             </div>
         </div> ";
        }
}
}



// displaying brands in sidenav
function getbrands(){
    global $con;
    $select_brands="select *from `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while( $row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo "  
        <li class='nav-item'>
        <a href='E.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li> ";
    } 
}





//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories="select *from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while( $row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " 
       <li class='nav-item'>
      <a href='E.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      </li> ";
    }         
}


//searching products function
function search_product(){

    global $con;          //to connect with db
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '% $search_data_value%'";       //'' and % coz keyword is varchar and this for searching apple from any line
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger's>No product for this category.</h2>";
        }
        while( $row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              // $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "       <div class='col-md-4' mb-2>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: Rs.$product_price</p>
                      <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
                   </div>
             </div>
         </div> ";
        }
}
}

//view details function
function view_details(){
    global $con;
     //condition to check isset or not
     if(isset($_GET['product_id'])){
     if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];
            // if category and brand not set then only we have to display this data
            $select_query="Select *from `products` where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while( $row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              // $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $product_image1=$row['product_image2'];
              $product_image1=$row['product_image3'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "       <div class='col-md-4' mb-2>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: Rs.$product_price</p>
                      <a href='E.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                      <a href='E.php' class='btn btn-primary bg-secondary'>Go Home</a>
                   </div>
             </div>
         </div>
         
         <div class='col-md-8'>
         <!--realted images-->
         <div class='row'>
             <div class='col-md-12'>
                 <h4 class='text-center text-info mb-5'>Related products</h1>
             </div>
             <div class='col-md-6'>
             <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
             </div>
             <div class='col-md-6'>
             <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
             </div>
         </div>
     </div>";
        }
}
}
}
}


//get ip address functoin
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//cart sunction
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add=getIPAddress();
        $get_product_id=$_GET['add_to_cart'];

        $select_query="select * from `cart_details` where ip_address='$get_ip_add' and product_id='$get_product_id'";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo"<script>window.open('E.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ('$get_product_id', '$get_ip_add',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo"<script>alert('Item is added to cart')</script>";
            echo"<script>window.open('E.php','_self')</script>";
        }
    }
}

//function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add=getIPAddress();
        $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
        }else{
            global $con;
            $get_ip_add=getIPAddress();
            $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_item=mysqli_num_rows($result_query);
        }
        echo $count_cart_item;
    }

//total price function
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);   //storing array
            $product_values=array_sum($product_price);  //sum of array
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}

?>