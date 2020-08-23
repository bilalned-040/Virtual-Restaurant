
<?php
include("includes/db.php");
include("functions/functions.php");



//getting customer id:
if(isset($_GET['c_id'])){
    $customer_id=$_GET['c_id'];
}

//getting product price and number of items
$ip_add=get_client_ip();
    $total=0;

    $sel_price="select * from shop where ip_add='$ip_add'";
    $run_price=mysqli_query($con,$sel_price);

    $status='Pending'; //setting status
    $count_pro=mysqli_num_rows($run_price);//setting no of total items


    while($record=mysqli_fetch_array($run_price)){

        $pro_id=$record['p_id'];
        $pro_price="select * from deals where product_id='$pro_id'";
        $run_pro_price=mysqli_query($con,$pro_price);


    }

//getting qty from cart

$get_cart="select * from shop where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$get_cart);
$get_qty=mysqli_fetch_array($run_cart);
$qty=$get_qty['qty'];
$sub_total=$get_qty['price'];


if($get_qty){
$insert_order="insert into cus_orders (customer_id,due_amount,total_products,order_status) values ('$customer_id','$sub_total','$count_pro','$status')";
$run_order=mysqli_query($con,$insert_order);

echo "<script>alert('Your order has been submitted successfully!')</script>";

$insert_to_pending_orders="insert into pend_orders (customer_id,product_id,qty,order_status) values ('$customer_id','$pro_id','$qty','$status')";
$run_pending_orders=mysqli_query($con,$insert_to_pending_orders);

$empty_cart="delete from shop where ip_add='$ip_add'";
$run_empty=mysqli_query($con,$empty_cart);
}
echo "<script>window.open('customer/my_account.php','_self')</script>";



?>



