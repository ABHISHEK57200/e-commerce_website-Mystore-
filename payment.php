<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img{
            display: block;
            /* position: absolute; */
            /* top: 30%;
            left: 20%; */
            width:90%;
            margin: auto;
            /* align: center; */

        }
    </style>
</head>
<body>
    <?php
     
    //  if(!isset($_SESSION['username'])){
    //      include "login.php";
    //  }
    //  else{
        //  include "payment.php"; 
        $ip=getIpAddress();
        $select_query="select * from `user_table` where user_ip='$ip'";
        $result=mysqli_query($conn,$select_query);
        $count_rows=mysqli_num_rows($result);
        // while($row=mysqli_fetch_assoc($result)){
        //     $user_id=$row['userId'];
        // }
        // $row=mysqli_fetch_array($result);
        if($count_rows>0){
            $row=mysqli_fetch_array($result);
            if(isset($row['userId']))
            {
                $user_id=$row['userId'];
            }else {
                // Handle the case where 'userId' is not set in the result
                // echo "User ID not found.";
                $user_id = null; // or take appropriate action
            }
        }else {
            // Handle the case where 'userId' is not set in the result
            // echo "User ID not found.";
            $user_id = null; // or take appropriate action
        }
        
        // $user_id=$row['userId'];
       
    //  }
     
   
    ?>
    <div class="container">
    <h1 class="text-center text-primary ">payment option</h1> 
    <div class="row">
    <div class="col-md-6">
    <a href="orders.php ? user_id=<?php echo $user_id; ?>"><img src="upi_image.png" alt="imag not found" class="my-4 "></a>
    </div>
    <div class="col-md-6"><a href="orders.php?uer_id=<?php echo $user_id; ?>" class="text-center text-primary my-5 " ><h2 class="text-center text-primary my-5 " >payOffline</h2></a></div>
    </div>
    </div>
</body>
</html>