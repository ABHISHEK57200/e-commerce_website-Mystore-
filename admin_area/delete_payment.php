<?php
if(isset($_GET['delete_payment']))
{
    $invoice_number=$_GET['delete_payment'];
    // print($cat_id);
    $delete_query="delete from `order` where invoice_number=$invoice_number";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('payment is deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
    }
}
?>