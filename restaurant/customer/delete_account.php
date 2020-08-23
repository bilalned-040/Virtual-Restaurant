<form action="" method="POST">

    <div class='heading'>
    
        <h2>Do You really want to delete your Account</h2>
        <button type='submit' class='btn btn-outline-warning' name="yes">Yes</button>
        <button type='submit' class='btn btn-outline-warning' name="no">No</button>
    </div>
        
</form>


<?php
include("../includes/db.php");

$c=$_SESSION['customer_email'];

if(isset($_POST['yes'])){
    $delete_customer="delete from customers where customer_email='$c'";
    $run_delete=mysqli_query($con,$delete_customer);

    if($run_delete){

        session_destroy();
        echo "<script>alert('Your Account has been deleted!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['no'])){
    echo "<script>window.open('my_account.php','_self')</script>";
}    


?>