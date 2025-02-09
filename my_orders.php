<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- this fil is included inside the profile.php -->
    <h3 class="text-center text-success">My All orders</h3>
    <table  class="table table-bordered text-center" >
  <thead>
    
  </thead>
  <tbody>
  <?php
    $username=$_SESSION['username'];
    $select_pending="select * from `user_table` where username='$username'";
    $result2=mysqli_query($conn,$select_pending);
    $row_query=mysqli_fetch_assoc($result2);
      $userId=$row_query['userId'];
    $SrNo=1;
    
    $select_query="select * from `order`where user_id=$userId";
    $result=mysqli_query($conn,$select_query);
    $count_row=mysqli_num_rows($result);
    if($count_row>0){
        echo " <tr scope='row' >
            <th scope='col'>
            Sr.No
            </th>
            <th scope='col'>Oredr number</th>
            <th scope='col'>Amount due</th>
            <th scope='col'>Total product</th>
            <th scope='col'>Invoice Number</th>
            <th scope='col'>date</th>
            <th scope='col' >complete/incomplete</th>
            <th scope='col'>Status</th>
        </tr> ";
        while($rows=mysqli_fetch_assoc($result)){
            $orderNUmber=$rows['order_id'];
            $amountDue=$rows['amount_due'];
            $totalProduct=$rows['total_product'];
            $InvoiceNUmber=$rows['invoice_number'];
            $date=$rows['order_date']; 
            $orderstatus=$rows['order_status'];
            $ordeId=$rows['order_id'];
             if($orderstatus=='pending'){
                $status='Incomplete';
             }
             else{
                $status='complete';
             }

           echo " <tr scope='row'>
            <td>$SrNo</td>
           <td>$orderNUmber</td>
           <td>$amountDue</td>
           <td>$totalProduct</td>
           <td> $InvoiceNUmber</td>
           <td> $date</td>
           <td> $status</td>";
           ?>
           <?php
           if($orderstatus=='complete'){
            echo "<td>paid</td>";
           }
           else{
              echo "<td> <a href='confirm_payment.php?order_id=$ordeId '> confirm </a></td> </tr>";
           }
           $SrNo++;
           
          
        }
    }
    ?>
    
  </tbody>
</table>

    
   
   
</body>
</html>