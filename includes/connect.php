<?php
$con=mysqli_connect('localhost','root','','ecom');
if(!$con){                           // condition
    die(mysqli_error($con));
}
?>