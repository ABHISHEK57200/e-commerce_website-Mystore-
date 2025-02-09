<?php
if(isset($_GET['delete_product'])){
    $product_id=$_GET['delete_product'];
    $delete_query="delete from `product`where product_id=$product_id ";
    $delete_result=mysqli_query($conn,$delete_query);
    if($delete_result){
        echo "<script>alert('product is deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    } 
}
?>