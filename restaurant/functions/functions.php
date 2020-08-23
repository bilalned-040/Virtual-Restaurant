<?php

$con =  mysqli_connect("localhost:8111","root","","myres");


// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//Cart function



//number of items
function items(){
    global $con;
    $ip_add=get_client_ip();
    if(isset($_GET['add_shop'])){
        $get_items="select * from shop where ip_add='$ip_add'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    else{
        $get_items="select * from shop where ip_add='$ip_add'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    echo $count_items;
}

//Total Price

function price(){
    global $con;
    $ip_add=get_client_ip();
    $total=0;

    $sel_price="select * from shop where ip_add='$ip_add'";
    $run_price=mysqli_query($con,$sel_price);

    while($record=mysqli_fetch_array($run_price)){

        $pro_id=$record['p_id'];
        $pro_price="select * from deals where product_id='$pro_id'";
        $run_pro_price=mysqli_query($con,$pro_price);

        while($p_price=mysqli_fetch_array($run_pro_price)){
            $product_price=array($p_price['product_price']);
            $values = array_sum($product_price);
            $total +=$values;
        }

    }
    echo $total;
}




//getting the defaults for customer

function getDefault(){
    global $con;
    $c=$_SESSION['customer_email'];
    $get_c="select * from customers where customer_email='$c'";
    $run_c=mysqli_query($con,$get_c);
    $row_c=mysqli_fetch_array($run_c);
    $customer_id=$row_c['customer_id'];

    if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
            $get_orders="select * from cus_orders where customer_id='$customer_id' AND order_status='Pending'";
            $run_orders=mysqli_query($con,$get_orders);
            $count_orders=mysqli_num_rows($run_orders);
            if($count_orders>0){
                echo"
                <div class='heading'>
                    <h2>You have ($count_orders) Pending Orders</h2>
                    <h2>See Your Order Details</h2>
                    <button type='button' class='btn btn-outline-warning'><a href='my_account.php?my_orders' style='text-decoration:none; color:#FFD700;'>Order Details</a></button>
                    <button type='button' class='btn btn-outline-warning'><a href='my_account.php?delete_account' style='text-decoration:none; color:#FFD700;'>Delete Account</a></button>
                </div>
                ";
            }
            else{
                echo"
                <div class='heading'>
                    <h2>You have no Pending Orders</h2>
                    <h2>Go to Shop</h2>
                    <button type='button' class='btn btn-outline-warning'><a href='../index.php' style='text-decoration:none; color:#FFD700;'>Shop</a></button>
                    <button type='button' class='btn btn-outline-warning'><a href='my_account.php?delete_account' style='text-decoration:none; color:#FFD700;'>Delete Account</a></button>
                </div>
                "; 
            }
        } 
    }

}

?>