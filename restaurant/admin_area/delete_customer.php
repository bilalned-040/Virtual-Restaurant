<?php

include("../includes/db.php");

if(isset($_GET['delete_c'])){
    $del_id=$_GET['delete_c'];

    $del_cus="delete from customers where customer_id='$del_id'";
    $run_del=mysqli_query($con,$del_cus);

    if($run_del){
        echo "<script>alert('Deleted Successfully!')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
    
}

?>