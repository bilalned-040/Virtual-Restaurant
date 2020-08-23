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
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Delete</th>
        </tr>

        <?php

        include("../includes/db.php");
             $get_cus="select * from customers";
             $run_cus=mysqli_query($con,$get_cus);
            
             (int)$i=0;
             while($row_cus=mysqli_fetch_array($run_cus)){
                $c_id=$row_cus['customer_id'];
                $c_name=$row_cus['customer_name'];
                $c_email=$row_cus['customer_email'];
                $c_contact=$row_cus['customer_contact'];
               (int)$i++;


                echo"
                    <tr>
                        <td>$i</td>
                        <td>$c_name</td>
                        <td>$c_email</td>
                        <td>$c_contact</td>
                        <td><a style='text-decoration:underline; color:white;' href='delete_customer.php?delete_c=$c_id;'>Delete</a></td>
                    </tr> 
                ";
                
            }
        ?>
    </table>
</div>


<?php
}
?>