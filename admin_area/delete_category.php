<?php
if(isset($_GET['delete_category']))
{
    $cat_id=$_GET['delete_category'];
    // print($cat_id);
    $delete_query="delete from `insert_category` where id=$cat_id";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('category is deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    }
}
?>