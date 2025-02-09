<?php
if(isset($_GET['delete_order']))
{
    $user_id=$_GET['delete_order'];
    // print($cat_id);
    $delete_query="delete from `order` where order_id=$user_id";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('brand is deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    }
}
?>