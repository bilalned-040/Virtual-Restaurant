<?php


if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{



?>

<div class='heading'>
    <h1>All Items</h1>
</div>
<div style='text-align:center; color:#FFD700; margin-top:25px; margin-bottom:50px; overflow-x:auto;'>
    <table>
            <tr>
            <th>Item No</th>
            <th>Title</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php

        include("../includes/db.php");
             $get_pro="select * from deals";
             $run_pro=mysqli_query($con,$get_pro);
            
             (int)$i=0;
             while($row_pro=mysqli_fetch_array($run_pro)){
                $p_id=$row_pro['product_id'];
                $p_title=$row_pro['product_title'];
                $p_price=$row_pro['product_price'];
               (int)$i++;


                echo"
                    <tr>
                        <td>$i</td>
                        <td>$p_title</td>
                        <td>$p_price</td>
                        <td><a style='text-decoration:underline; color:white;' href='index.php?edit_pro=$p_id;'>Edit</a></td>
                        <td><a style='text-decoration:underline; color:white;' href='delete_pro.php?delete_pro=$p_id;'>Delete</a></td>
                    </tr> 
                ";
                
            }
        ?>
    </table>
</div>


<?php
}
?>
