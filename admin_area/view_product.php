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
    <h4>view product</h4>
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
    
    $select_query="select * from `product`";
    $result=mysqli_query($conn,$select_query);
    $count_row=mysqli_num_rows($result);
    if($count_row>0){
        echo " <tr scope='row' >
        <th scope='col'>product id</th>
        <th scope='col'>title</th>
        <th scope='col'>product image</th>
        <th scope='col'>product price</th>
        <th scope='col'>total sold</th>
        <th scope='col' >status</th>
        <th scope='col'>edit</th>
        <th scope='col'>delete</th>
    </tr> ";
        while($rows=mysqli_fetch_assoc($result)){
            $productid=$rows['product_id'];
            $productTitle=$rows['Product_Title'];
            $productimage=$rows['product_image1'];
            $productPrice=$rows['product_price'];
            $product_status=$rows['status'];
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
            <td>$productid</td>
           <td> $productTitle</td>
           <td><img src='../upload_image/ $productimage' class='card-img-top' alt='$productTitle'></td>
           <td> $productPrice</td>
           <td> $productPrice</td>
           <td> $product_status</td>
           <td> <a href='index.php?edit_product=$productid'><i class='fa-solid fa-pen-to-square'></i></a></td>
           <td><a href='index.php?delete_product=$productid'> <i class='fa-solid fa-trash'></i></a></td>";
        
            }
        }
           ?>
            

        </tbody>
    </table>
    
</body>
</html>