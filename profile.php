<!-- if the user have not any item inside the cart then we redirected to the profile.php page -->
<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
@session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styling.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <style>  body{

overflow-x: hidden;
  }</style>
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid p=0" style="background-color:blue">
      <a class="navbar-brand" href="#">
        <div >
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4GFscrh7YagjLPPWaBJCjbiQUkp9GzFFGGg&s"  class="logo" alt="">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse padding=0" id="navbarSupportedContent"  >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="iidex.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profile.ph">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display_all.php">product</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_To_Cart.php"><i class="fa-solid fa-cart-minus"><?php 
            cart_detail();
            ?></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">total price:<?php price_details();?>/-</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="search_product.php" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" >
          <input class="btn btn-Outline-light" type="submit" placeholder="Search" aria-label="Search" name="search_data_product" >
          <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        </form>
        
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary " >
  <ul class="navbar-nav me-auto">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">welcome guest!</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php"> Login</a>
          </li> -->
          <?php
          
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='#'>welcome guest!</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='#'>".$_SESSION['username']."</a>
          </li>";
            
          }
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='login.php'> Login</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='logout.php'> logout</a>
          </li>";
          }
          ?>
          
</ul>
  </nav>
  <div class="bg-light">
    <h1 class="text-center"> My Store</h1>
    <p class="text-center"> communication is at least heart of the e-commerce and community</p>
  </div>
  <!-- fourth child -->
   <?php
    //  include "payment.php"; 
    // $ip=getIpAddress();
    if($_SESSION['username']){
    $username=$_SESSION['username'];
    $select_query="select * from `user_table` where username='$username'";
    $result=mysqli_query($conn,$select_query);
    $count_rows=mysqli_num_rows($result);
    // $row=mysqli_fetch_array($result);
    
    // if($count_rows>0){
      $row=mysqli_fetch_array($result);
      // print_r($row);
        $userImg=$row['userImg'];
        // $username1=$row['username'];
        // $useEmail=$row['userEmail'];
        // $address=$row['address'];
        // $mobile=$row['mobileNumber'];
        // echo $userImg;
    }
    else{
     echo "<script>window.open('login.php','_self')</script>";
    }
  //   if(isset($_POST['user_update'])){
  //     $username2=$_POST['user_username'];
  //     $useremail2=$_POST['user_email'];
  //     $userimage2=$_FILES['user_image']['name'];
  //      $userTemp2=$_FILES['user_image']['tmp_name'];
  //     $userAddress2=$_POST['user_address'];
  //     $userMobile2=$_POST['user_mobile'];
  //     $username3=$_SESSION['username'];
  //     move_uploaded_file($userTemp2,"C:/xamppp/htdocs/new _e_commerce/upload_image/ $userimage2");
  // $select_pending="select * from `user_table` where username=$username3";
  // $result2=mysqli_query($conn,$select_pending);

  // $row_query=mysqli_fetch_assoc($result2);
  //   $userId=$row_query['userId'];
  //   echo $userId;
  //     $update_query=" UPDATE `user_table`  SET username='$username2', userEmail='$useremail2', userImg='$userimage2', `address`='$userAddress2',mobileNumber='$userMobile2' WHERE userId=$userId";
  //     $result2=mysqli_query($conn,$update_query);
  //     if($result2){
  //       echo "<script>alert('data is updated successfuly')</script>";
  //     }
      
  //   }
  // }upload_image\ abhi-image.jpg
   ?>
 <div class="row">
<div class="col-md-2 p-0">
    <ul class="navbar-nav bg-secondary text-center">
    <li class="nav-item bg-info">
            <a class="nav-link  text-light"  href="#"><h4>your profile</h4></a>
          </li>
          <li class="nav-item bg-secondary my-1">
            <img src="upload_image\ <?php echo $userImg ?>" height="113px" width="180px" alt="image not found">
          </li>
          <li class="nav-item bg-secondary">
          <a class="nav-link  text-light"  href="profile.php">pending orders</a>
          </li>
          <li class="nav-item bg-secondary">
          <a class="nav-link  text-light"  href="profile.php?edit_acc">edit account</a>
          </li>
          <li class="nav-item bg-secondary">
          <a class="nav-link  text-light"  href="profile.php?My_orders">My orders</a>
          </li>
          <li class="nav-item bg-secondary">
          <a class="nav-link  text-light"  href="profile.php?delete">Delete Account</a>
          </li>
          <li class="nav-item bg-secondary">
          <a class="nav-link  text-light"  href="logout.php">logout</a>
          </li>
    </ul>
</div>
<div class="col-md-10 text-center"> 
  <?php
  get_order_pending_details();
  if(isset($_GET['edit_acc'])){
    include 'edit_account.php';
  }
   
  if(isset($_GET['My_orders'])){
    include 'my_orders.php';
  }

  if(isset($_GET['delete'])){
    include 'delete_account.php';
  }

  ?>
</div>
 </div>


    
  
    <!-- <h1>Hello, world!</h1> -->

  <footer >
    <p > copyright 2002</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>