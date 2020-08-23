<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>



<!DOCTYPE html>
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

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="images/Fast+Food+Logo.png" alt="" height="50px" width="100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">

                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">MENU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">CONTACT US</a>
                        </li>
                        
                        <li class="nav-item">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                            echo "<a class='nav-link' href='checkout.php'>My Account</a>";
                            }
                            else{
                            echo "<a class='nav-link' href='customer/my_account.php'>My Account</a>";
                            }
                        ?>
                        </li>
                        <li class="nav-item">
              <a class="nav-link" href="admin_area/index.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
            </li>
                        <li class="nav-item">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                            echo "<a class='nav-link' href='checkout.php'><i class='fa fa-sign-in fa-lg' aria-hidden='true'></i></a>";
                            }
                            else{
                            echo "<a class='nav-link' href='logout.php'><i class='fa fa-sign-out fa-lg' aria-hidden='true'></i></a>";
                            }
                        ?>
                        </li>
                    </ul>
                </span>
            </div>
        </nav>

        <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EXISTING CUSTOMER </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="checkout.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input type="email" name="c_email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" name="c_pass" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" ><a href="customer_register.php" style="text-decoration:none; color:white;">CREATE ACCOUNT</a></button>
                            <button type="submit" name="c_login" value="Login" class="btn btn-primary btn-sm ml-1">SIGN IN</button>        
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['c_login'])){
                            $cus_email=$_POST['c_email'];
                            $cus_pass=$_POST['c_pass'];

                            $sel_customer="select * from customers where customer_email='$cus_email' AND customer_pass='$cus_pass'";
                            $run_customer=mysqli_query($con,$sel_customer);

                            $check_customer=mysqli_num_rows($run_customer);

                            $get_ip=get_client_ip();

                            $sel_shop="select * from shop where ip_add='$get_ip'";
                            $run_shop=mysqli_query($con,$sel_shop);

                            $check_shop=mysqli_num_rows($run_shop);

                            if($check_customer==0){
                                echo "<script>alert('Incorrect Email or Password')</script>";
                                echo "<script>window.open('cart.php','_self')</script>";
                            }

                            else if($check_customer==1 AND $check_shop==0){
                                $_SESSION['customer_email']=$cus_email;
                                echo "<script>window.open('customer/my_account.php','_self')</script>";
                            }

                            else{
                                $_SESSION['customer_email']=$cus_email;
                                include("payment.php");
                            }
                            // if(mysqli_num_rows($run_customer)>0){
                            //     $_SESSION['customer_email']=$cus_email;
                            //     echo "<script>window.open('index.php','_self')</script>";
                            // }
                            // else{
                            //     echo "<script>alert('Incorrect Email or Password')</script>"; 
                            // }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <?php
                if(!isset($_SESSION['customer_email'])){
                    include("customer/customer_login.php");
                    
                }
                else{
                    include("payment.php");
                }
            ?>
        </div>

        <div class="footer fixed-bottom">
          <div class="container">
            <div class="row">
              <div class="col col-12 col-md-4">
              <div class="contact">
                  <p>
                    FAST FOOD <br>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Shop# 02, Gulshan-e-Iqbal, near Disco <br>Bakery, Karachi, Pakistan. <br>
                    <i class="fa fa-phone" aria-hidden="true"></i> 021-12345678, 021-1234580 <br>
                    <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp; 0345-2233441, 0322-2233450 <br>
                    <i class="fa fa-envelope" aria-hidden="true"></i> fastfood@hotmail.com<br>
                  </p>
                </div>
              </div>
              <div class="col col-12 col-md-4">
                  <img src="images/Fast+Food+Logo.png" alt="" width="150px" height="150px">
              </div>
              <div class="col col-12 col-md-4">
                  <div class="contact mt-4">
                      <p>
                          Copyright <i class="fa fa-copyright" aria-hidden="true"></i> Fast Food Restaurant
                      </p>
                    </div>
              </div>
          </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
          $("#reserveBtn").click(function(){
            $('#loginModal').modal('toggle')
          })
        });

    </script>
</body>

</html>