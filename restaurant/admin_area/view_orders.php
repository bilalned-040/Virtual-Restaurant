<?php


if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{



?>
<div class='heading'>
    <h1>All Customers</h1>
</div>
<div style='text-align:center; color:#FFD700; margin-top:25px; margin-bottom:50px; overflow-x:auto;'>
    <table>
            <tr>
            <th>Order No</th>
            <th>Customer Email</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Done</th>
        </tr>

        <?php

        include("../includes/db.php");
             $get_orders="select * from pend_orders";
             $run_orders=mysqli_query($con,$get_orders);
            
             (int)$i=0;
             while($row_orders=mysqli_fetch_array($run_orders)){
                $order_id=$row_orders['order_id'];
                $customer_id=$row_orders['customer_id'];
                $product_id=$row_orders['product_id'];
                $qty=$row_orders['qty'];
                $order_status=$row_orders['order_status'];
               (int)$i++;

            $get_cus="select * from customers where customer_id='$customer_id'";
            $run_cus=mysqli_query($con,$get_cus);
            $row_cus=mysqli_fetch_array($run_cus);
            $customer_email=$row_cus['customer_email'];


                echo"
                    <tr>
                        <td>$i</td>
                        <td>$customer_email</td>
                        <td>$product_id</td>
                        <td>$qty</td>
                        <td>$order_status</td>
                        <td><a style='text-decoration:underline; color:white;' href='done_order.php?done_order=$order_id;'>Done</a></td>
                    </tr> 
                ";
                
            }
            
        ?>
    </table>
</div>

<?php
}
?>