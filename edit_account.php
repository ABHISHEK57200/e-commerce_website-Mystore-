<?php
// include('admin_area/catDB.php');
// @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
    <style>
        .updateImg{
            height: 50px;
            width: 40px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['edit_acc'])){
   $username=$_SESSION['username'];
    $select_query="select * from `user_table` where username='$username'";
    $result=mysqli_query($conn,$select_query);
    $row=mysqli_fetch_assoc($result);
    $userId=$row['userId'];
    $username1=$row['username'];
    $useEmail=$row['userEmail'];
    $address=$row['address'];
    $mobile=$row['mobileNumber'];
    }
    if(isset($_POST['user_update'])){
        $updateid=$userId;
        $username2=$_POST['user_username'];
        $useremail2=$_POST['user_email'];
        $userimage2=$_FILES['user_image']['name'];
         $userTemp2=$_FILES['user_image']['tmp_name'];
        $userAddress2=$_POST['user_address'];
        $userMobile2=$_POST['user_mobile'];
        // $username3=$_SESSION['username'];
        move_uploaded_file($userTemp2,"C:/xamppp/htdocs/new _e_commerce/upload_image/ $userimage2");
    // $select_pending="select * from `user_table` where username=$username3";
    // $result2=mysqli_query($conn,$select_pending);
  
    // $row_query=mysqli_fetch_assoc($result2);
    //   $userId=$row_query['userId'];
    //   echo $userId;
        $update_query=" UPDATE `user_table`  SET username='$username2', userEmail='$useremail2', userImg='$userimage2', `address`='$userAddress2',mobileNumber='$userMobile2' WHERE userId=$updateid";
        $result2=mysqli_query($conn,$update_query);
        if($result2){
          echo "<script>alert('data is updated successfuly')</script>";
          echo "<script>window.open('logout.php','_self')</script>";
        }
        
      }
    
    ?>
  <h4 class="text-center text-primary">edit account</h4> 
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $username1;?>" class="form-control w-50 m-auto" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" value="<?php echo  $useEmail;?>" class="form-control w-50 m-auto" name="user_email">
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <input type="file"  class="form-control m-auto " name=" user_image" height="30px">
            <img src="upload_image\ <?php echo $userImg ?>" alt="" class="updateImg">
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $address;?>" class="form-control w-50 m-auto" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="number" value="<?php echo $mobile;?>" class="form-control w-50 m-auto" name="user_mobile">
        </div>
        <input type="submit" class="py-2 px-2 border-0 text-center bg-info" name="user_update" value="update">
    </form>
</body>
</html>