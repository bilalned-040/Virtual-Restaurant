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
        <div class="container">
            <div class="row">
                <div class="col col-md-6 col-12">
                    <iframe style="margin: 20px 20px 0px 20px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14472.339472894042!2d67.0973307!3d24.9291786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfc89cc5d65354581!2sDisco%20Bakers!5e0!3m2!1sen!2s!4v1597669872464!5m2!1sen!2s"
                        width="390" height="350" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col col-md-6 col-12">
                    <p style="color:#FFD700; font-weight: bold; margin-top: 20px;">
                        SIMTEK POWER SERVICES <br>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                        Shop# 02, Gulshan-e-Iqbal, near Disco<br>Bakery, Karachi, Pakistan. <br>
                        <i class="fa fa-phone" aria-hidden="true"></i> 021-12345678, 021-1234580 <br>
                        <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp; 0345-2233441, 0322-2233450 <br>
                        <i class="fa fa-envelope" aria-hidden="true"></i> fastfood@hotmail.com<br>
                        <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; <a style="color: #FFD700;"
                            href="https://www.facebook.com/">Like us on Facebook</a><br>
                    </p>
                </div>
            </div>

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
</body>

</html>
