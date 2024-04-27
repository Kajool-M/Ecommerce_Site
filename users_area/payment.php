<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        img{
            width:100%;   
        }

        .image{
            float:right;
            width:50%;
        }
    </style>
</head>
<body>


    <!-- php code to access user id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>

<div class="image">
<img src="../images/paypal.jpg" alt="" class="paypal"></div></div>

    <div class="container text-center">
        <h2 class="text-center text-primary">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/uu.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="https://esewa.com.np/#/home" target="_blank"><img src="../images/e.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>"><p class="text-center ">Cash on delivery</p></a>
            </div>
        </div>
        <a href='../E.php' class='btn btn-primary bg-secondary "text-center"'>Go Back</a>
    </div>
</body>
</html>