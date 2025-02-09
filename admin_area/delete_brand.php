<?php
if(isset($_GET['delete_brand']))
{
    $brand_id=$_GET['delete_brand'];
    // print($cat_id);
    $delete_query="delete from `brand` where brand_id=$brand_id";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('order is deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    }
}
?>