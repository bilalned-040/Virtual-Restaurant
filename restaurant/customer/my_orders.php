<?php
include("../includes/db.php");


$c=$_SESSION['customer_email'];
$get_c="select * from customers where customer_email='$c'";
$run_c=mysqli_query($con,$get_c);
$row_c=mysqli_fetch_array($run_c);
$customer_id=$row_c['customer_id'];
?>



<div class='heading'>
    <h1>Your Orders</h1>
</div>
<div style='text-align:center; color:#FFD700; margin-top:25px; margin-bottom:50px; overflow-x:auto;'>
    <table>
            <tr>
            <th>Order No</th>
            <th>Due Amount</th>

            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>

        <?php
             $get_orders="select * from cus_orders where customer_id='$customer_id'";
             $run_orders=mysqli_query($con,$get_orders);
             $i=0;
             while($row_orders=mysqli_fetch_array($run_orders)){
                $due_amount=$row_orders['due_amount'];
                
                $total_products=$row_orders['total_products'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                $i++;
                if($order_status=='Pending'){
                    $order_status='Unpaid';
                }
                else{
                    $order_status='Paid';
                }
                echo"
                    <tr>
                        <td>$i</td>
                        <td>$due_amount</td>
                
                        <td>$total_products</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                    </tr> 
                ";
                
            }
        ?>
    </table>
</div>