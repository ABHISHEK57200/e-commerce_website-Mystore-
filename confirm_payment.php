<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
@session_start();

if(isset($_GET['order_id'])){
    $orderId=$_GET['order_id'];
    // selct the invoice number and amount from the order table
  
    $select_data="select *from `order` where order_id=$orderId ";
    $result_data=mysqli_query($conn,$select_data);
    $order_row=mysqli_fetch_array($result_data);
    $invoice=$order_row['invoice_number'];
    $amount=$order_row['amount_due'];
    // echo $invoice;


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <form action="" method="post" class="text-center">
        <div class=" from-outline w-50 m-auto my-3">
       <input type="text" name="invoice_number" id="" value="<?php echo $invoice; ?>" class=" form-control m-auto w-50"> 
       </div>
       <div class=" from-outline w-50 m-auto">
        <label for="amunt" class="text-light mx-5 ">Amount</label>
       <input type="text" name="amount" id="amount"  value="<?php echo $amount; ?>" class=" form-control m-auto w-50" > 
       </div>
       <div class=" from-outline w-50 m-auto my-3">
      <select name="payment_mode" id="" class="form-select w-50 m-auto">
        <option value="">select payment</option>  
        <option value="">upi</option>
        <option value="">net banking</option>
        <option value="">pay pal</option>
        <option value="">cash on delivery</option>
        <option value="">pay payOffline</option>
      </select>
       </div>
       <input type="submit" name="confirm_payment" id="" value="confirm" class=" text-center bg-info p-2 border-0" name="confirm_payment"> 
    </form>
</body>
</html>
<?php
if(isset($_POST['confirm_payment'])){
    $invoice1=$_POST['invoice_number'];
    $amount1=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    
    $insert_query="insert into `user_payment`(order_id,invoice_number,amount,payment_mode) values($orderId,$invoice1,$amount1,'$payment_mode')";
    $insert_result=mysqli_query($conn,$insert_query);
    if($insert_result){
        
        echo "<script>alert('payment successful')</script>";
        echo "<script>window.open('profile.php','_self')</script>";

    }
    $updatestatus="update `order` set order_status='complete' where order_id=$orderId";
    $update_result=mysqli_query($conn,$updatestatus);
    
}
?>