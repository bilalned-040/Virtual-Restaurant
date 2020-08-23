<?php
include("../includes/db.php");
if(isset($_GET['done_order'])){
    $done_id=$_GET['done_order'];

    $done_order="update pend_orders set order_status='Delivered' where order_id='$done_id'";
    $run_done=mysqli_query($con,$done_order);

    $done_order_status="update cus_orders set order_status='Delivered' where order_id='$done_id'";
    $run_done_status=mysqli_query($con,$done_order_status);

    if($run_done){
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
    
}

?>