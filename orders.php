<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
if(isset($_GET['user_id'])){
    
    $user_id=$_GET['user_id'];
}
?>
<!-- getting total items and total price -->
 <!-- uses as link inside the payment.php file -->
 <?php
 $ip=getIpAddress();
 $select_query="select * from card_details where 	IP_Address='$ip' ";
$result=mysqli_query($conn,$select_query);
$invoice_number=mt_rand();
$status='pending';
$total=0;
while($card_rows=mysqli_fetch_assoc($result)){
$prodcutId=$card_rows['Product_id'];
$select_product="select * from product where product_id=$prodcutId";
$product_result=mysqli_query($conn,$select_product);
while($product_row=mysqli_fetch_assoc($product_result)){
    $product=array($product_row['product_price']);
    $sum=array_sum( $product);
    $total+=$sum;

}
}
// get the result for the price calculate and these all are value stored inside the order table
$get_cart="select * from card_details";
$card_result=mysqli_query($conn,$get_cart);
$card_row=mysqli_fetch_array($card_result);
$card_quantity=$card_row['Quantity'];
if($card_quantity==1){
    $quantity=1;
    $subtotal=$total;
}
else{
    $quantity=$card_quantity;
    $subtotal=$total*$quantity;
}

$insert="Insert into `order`(user_id,amount_due,invoice_number,total_product,order_status,order_date) values ($user_id,$subtotal,$invoice_number,$quantity,'$status',NOW())";
$insert_result=mysqli_query($conn,$insert);
if($insert_result){
  echo  "<script>alert('data is inserted successfully')</script>";
  echo "<script>window.open('profile.php','_self')</script>";
}

// insert the items into order pending table
$insert_pendind_table="Insert into `order_panding`(user_id,invoice_number,product_id,order_status,quantity) values ($user_id,$invoice_number,$prodcutId,'$status',$quantity)";
$delete_result=mysqli_query($conn,$insert_pendind_table);

// delete the the item from card table
$empty_cart="delete from `card_details` where IP_Address='$ip";
$result_delete=mysqli_query($conn,$empty_cart);
?>