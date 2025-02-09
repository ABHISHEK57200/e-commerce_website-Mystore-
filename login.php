

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
  </head>
  <body>
  
 
  
  <form method="post" action=" "  class="text-center">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10 ">
      <input type="text" class="form-control" id="inputEmail3" name="username">
    </div>
  </div>
  <div class="row mb-3 text-center">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-center">Password</label>
    <div class="col-sm-10  ">
      <input type="password" class="form-control" id="inputPassword3" name="password">
    </div>
  </div>
<div style="display: flex; float:right;">
  <a href="#">forget password</a>
  </div>
  <br>
  
  <!-- <button type="submit" class="btn btn-primary" style="float: right; display:flex">Sign in</button><br><br> -->
   <input type="submit" name="login" placeholder="login" class="btn btn-primary" style="float: right; display:flex;">
  <h4  style="float: left; display:flex ;margin-left: 15%;">don't have an account? <a href="registration.php">Register</a></h4>
</form>

  <!-- <footer >
    <p > copyright 2002</p>
  </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_POST['login'])){
  $username=$_POST['username'];
$password=$_POST['password'];
//   session_start();
// $_SESSION['username']= $username;
// $_SESSION['password']=$password;

$ip=getIpAddress();
$select_query="select * from user_table where username='$username'";
$result=mysqli_query($conn,$select_query);
$count_rows=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
// echo $count_rows;
//cart item
$select_query_cart="select * from `card_details` where IP_Address='$ip'";
$result_cart=mysqli_query($conn,$select_query_cart);
$count_rows_cart=mysqli_num_rows($result_cart);
// echo $count_rows_cart;
// $row_cart=mysqli_fetch_assoc($result);
if($count_rows>0){
  $_SESSION['username']=$username;
  if(password_verify($password,$row['password'])){
    // echo "<script>alert('login successfully')</script>";
    //$count_rows==1: that means the user is logged in succefully
    //$count_rows_cart==0: the user have not any item in the cart
    if($count_rows==1 and $count_rows_cart==1){
      $_SESSION['username']=$username;
        //redirected to the user profile
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    else{
      $_SESSION['username']=$username;
      //redirect to the payment page
      echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
    }
  }else{
    echo "<script>alert('invalid credential')</script>";
  }

}else{
  echo "<script>alert('invalid credential')</script>";
}
// echo $result;


}
?>

