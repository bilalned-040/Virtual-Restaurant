<?php
// session_start();
include("includes/db.php");
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAST FOOD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> -->



<div style='text-align:center; color:#FFD700; margin-top:30px; margin-bottom:50px;'>
    <h1 style='color:#FFD700; text-align:center;'>You are Logged In</h1>

    <?php
        $ip=get_client_ip();
        $get_customer="select * from customers where customer_ip='$ip'";
        $run_customer=mysqli_query($con,$get_customer);

        $customer=mysqli_fetch_array($run_customer);
        $customer_id=$customer['customer_id'];
        
    ?>

    <button type='button' class='btn btn-outline-warning'><a href="order.php?c_id=<?php echo $customer_id; ?>" style="text-decoration:none; color:#FFD700" >Click here to Proceed</a></button>
</div>


