<?php
include('../includes/connect.php');     //1st. to come up of the admin folder and 2nd . to go to image folder
// we have to perform this only if insert button is click
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accesing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo"<script>alert('Please fill all the fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");       //to move the image inside product_iamge
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_product="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id, product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo"<script>alert('Successfully inserted the products')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>

     <!-- bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<!--font aswsome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center"> Insert Product</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="requires"/>
            </div>

            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="requires"/>
            </div>

            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="requires"/>
            </div>

             <!--categories-->
              <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_categories" id="" class="form-select">
                   <option value="">Select a category</option>
                    <?php
                      $select_query="Select * from `categories`";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                      }
                ?>
                </select>
                </div>

            <!-- brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                <option value="">Select a brand</option>
                <?php
                            $select_query="select * from `brands`";
                            $result_query=mysqli_query($con,$select_query);
                            //to select all from db
                            while($row=mysqli_fetch_assoc($result_query)){
                                $brand_title=$row['brand_title'];
                                $brand_id=$row['brand_id'];
                                echo"<option value='$brand_id'>$brand_title</option>";
                            }
                 ?>
                </select>
            </div>

             <!--Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="requires"/>
            </div>

            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required="requires"/>
            </div>

            <!--Image 3-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required="requires"/>
            </div>

            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"  required="requires"/>
            </div>

            <!--price-->
             <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product"/>
            </div>
                    
        </form>
    </div>
    
</body>
</html>