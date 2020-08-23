<?php
session_start();
    include("../includes/db.php");
?>

<html>

<head>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <title>Sign in</title>
  <style>
          body {
            background-color:rgba(77,77,77,1);
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: black;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 40px;
        color: #FFD700;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background:white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: black;
        background: #FFD700;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    
    /* a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    } */
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
  </style>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Admin Login</p>
    <form class="form1" action="" method="POST" enctype='multipart/form-data'>
      <input class="un " type="text" name="admin_email" align="center" placeholder="Email" required>
      <input class="pass" type="password" align="center" name="p" placeholder="Password" required>
      
        <input class="pass" style="background-color:#FFD700;" type="submit" name="login" value="Sign in">
      </form>          
    </div>
     
</body>

</html>

<?php

if(isset($_POST['login'])){
    $user_email=$_POST['admin_email'];
    $user_pass=$_POST['p'];

    if($user_email=="bilal@gmail.com"){
        if($user_pass=="bilal"){
            $_SESSION['admin_email']=$user_email;
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "<script>alert('Incorrect emai or password!')</script>";
        }
    }
    else{
        echo "<script>alert('Incorrect email or password!')</script>";
    }

}

?>
