
<?php

include("../includes/db.php");

if(isset($_GET['edit_pro'])){
    $edit_id=$_GET['edit_pro'];

    $get_edit="select * from deals where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_edit);
    $row_edit=mysqli_fetch_array($run_edit);

    $update_id=$row_edit['product_id'];

    $p_title=$row_edit['product_title'];
    $p_price=$row_edit['product_price'];
    $p_des=$row_edit['product_des'];
    
}

?>

<div class="heading">
          <h1>Edit Items</h1>
          <form action="" method="POST" enctype="multipart/form-data" style="background-color:rgba(77,77,77,0.5);">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail1">Product Title:</label>
                <input type="text" name="product_title" class="form-control" id="inputEmail1" value='<?php echo $p_title ?>' required>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail2">Product Price:</label>
                <input type="text" name="product_price" class="form-control" id="inputEmail2" value='<?php echo $p_price ?>' required>
                </div>
                <div class="form-group col-md-12">
                <label for="inputEmail3">Product Description:</label>
                <input type="text" name="product_des" class="form-control" id="inputEmail3" value='<?php echo $p_des ?>' required>
                </div>
            </div>
            <button type="submit" name="update_product" class="btn btn-outline-warning">Update</button>
        </form>
        </div>

<?php


if(isset($_POST['update_product'])){
    $p_title=$_POST['product_title'];
    $p_price=$_POST['product_price'];
    $p_des=$_POST['product_des'];   

    $update_pro="update deals set product_title='$p_title',product_price='$p_price',product_des='$p_des' where product_id='$update_id'";
    $run_update=mysqli_query($con,$update_pro);
    if($run_update){
        echo "<script>alert('Updated Successfully!')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }

}
?>
        