<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>view_product</title>
    <style>
    img{
        
        
        height: 100px;
            width: auto;
            max-width: 100px;
        }
    </style>

</head>
<body>
    <h4>All_Order</h4>
    <table class="table table-bordered text-center">
        <thead>
            
        <?php
      
        ?>
        </thead>
        <tbody>
            <?php
    //     $username=$_SESSION['username'];
    // $select_pending="select * from `user_table` where username='$username'";
    // $result2=mysqli_query($conn,$select_pending);
    // $row_query=mysqli_fetch_assoc($result2);
    //   $userId=$row_query['userId'];
    // $SrNo=1;
    $count=1;
    $select_query="select * from `order`";
    $result=mysqli_query($conn,$select_query);
    $count_row=mysqli_num_rows($result);
    if($count_row>0){
        echo " <tr scope='row' >
        <th scope='col'>Sr.No.</th>
        <th scope='col'>due Amount</th>
        <th scope='col'>Invoice Number</th>
        <th scope='col'>Total products</th>
        <th scope='col'>Order Date</th>
        <th scope='col'>Status</th>
        <th scope='col'>Delete</th>
    </tr> ";
        while($rows=mysqli_fetch_assoc($result)){
           
            $invoice_number=$rows['invoice_number'];
            $user_id=$rows['order_id'];
            $quantity=$rows['total_product'];
            $status=$rows['order_status'];
            $amount=$rows['amount_due'];
            $date=$rows['order_date'];
            // $select_amount="select * from `user_payment` where invoice_number=$invoice_number";
            // $result2=mysqli_query($conn,$select_amount);
            // while($row=mysqli_fetch_assoc($result2)){
                
                
            // }

            // $brand_id=$rows['brand_id'];
           
         
            // $select_query2="select * from "
        //    while()
            //  if($orderstatus=='pending'){
            //     $status='Incomplete';
            //  }
            //  else{
            //     $status='complete';
            //  }
            // echo  $productimage;
           echo " <tr scope='row'>
           <td> $count</td>
          
            <td>$amount</td>
           <td>$invoice_number</td>
          
           <td>$quantity</td>
            <td>$date </td>

           <td> $status</a></td>
           <td><a href='index.php?delete_order=$user_id'> <i class='fa-solid fa-trash'></i></a></td>";
        $count++;
            }
        }
           ?>
            

        </tbody>
    </table>
    
</body>
</html>