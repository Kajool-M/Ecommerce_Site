<?php
include('../includes/connect.php');
 // condition
if(isset($_POST['insert_cat'])){              
    $category_title=$_POST['cat_title'];

    //select data from db     and fetches how many numbers of same items in db
    $select_query="select *from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('This category is present inside the database')</script>";     
    }else{

    $insert_query="insert into `categories` (category_title) values('$category_title')";
    $result=mysqli_query($con,$insert_query);                   //for execution //takes two parameters
    if($result){                                               //condition
        echo"<script>alert('Category has been inserted sucessfully')</script>";           //basic concept of js
    }
}}           
?>
<h1 class="text-center">Insert Category</h1>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">    <!-- we don't have to insert bootstrap here coz we have already nsert it in index.php-->
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1"> <!-- class form control helps bootstrap class wiil be applied-->
        </div>

        <div class="input-group w-10 mb-2 mb-auto">                     
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert categories">           
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->

     </div>

</form>