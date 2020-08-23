<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAST FOOD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        background-image: url(../images/hotel_paris_montmartre_resto.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .navbar{
        font-size:15px;
        background-color:rgba(77,77,77,0.5) !important ;
    }
    .footer{
        font-size:15px;
        background-color:rgba(77,77,77,0.5) !important ;
    }
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 2px solid white;
        background-color:rgba(77,77,77,0.7) !important ;
        }

        th, td {
        text-align: center;
        padding-bottom: 8px;
        }


    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../images/Fast+Food+Logo.png" alt="" height="35px" width="70px">
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view_products">View Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view_customers">View customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?view_orders">View Orders</a>
                        </li>
                        
                    </ul>
                </span>
            </div>
        </nav>

        <div class="container" style="margin-top:25px; text-align:center;">
        <?php
            include("../includes/db.php");

            if(isset($_GET['view_products'])){
                include("view_products.php");
            }
            else if(isset($_GET['edit_pro'])){
                include("edit_pro.php");
            }
            else if(isset($_GET['view_customers'])){
                include("view_customers.php");
            }
            else if(isset($_GET['view_orders'])){
                include("view_orders.php");
            }
            else{

                if(!isset($_SESSION['admin_email'])){
                echo"<div class='row h-100 justify-content-center align-items-center' style='margin-top:150px; margin-bottom:150px;'>
                    <a class='btn btn-warning' href='login.php' role='button'>Sign Up</a>
                    </div>";
                }
                else{
                    echo"<div class='row h-100 justify-content-center align-items-center' style='margin-top:150px; margin-bottom:150px;'>
                    <a class='btn btn-warning' href='logout.php' role='button'>Sign out</a>
                    </div>";
                }
                
            }
        ?>

        </div>


        

        <div class="footer">
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
                  <img src="../images/Fast+Food+Logo.png" alt="" width="120px" height="120px">
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
</body>

</html>