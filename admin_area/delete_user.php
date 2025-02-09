<?php
if(isset($_GET['delete_user']))
{
    $user_id=$_GET['delete_user'];
    // print($cat_id);
    $delete_query="delete from `user_table` where user_id=$user_id";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    }
}
?>