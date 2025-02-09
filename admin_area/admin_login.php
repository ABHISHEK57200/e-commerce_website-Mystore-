<?php

include('catDB.php');
include('../common_function/functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 10%;
            max-width: 600px;
            background: #ffffff;
            padding: 2rem;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            height: 350px;
            width: 350px;
        }
        .login-container h3 {
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-login {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <h3 class="text-center">Admin Login</h3>
            <form action=" " method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <input type="submit" name="login" placeholder="login">
            </form>
            <p>don't have an account? <a href="adminRegistration.php">Register</a> </p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['login'])){
  $username=$_POST['username'];
$password=$_POST['password'];
//   session_start();
// $_SESSION['username']= $username;
// $_SESSION['password']=$password;

// $ip=getIpAddress();
$select_query="select * from admin_table where userName='$username'";
$result=mysqli_query($conn,$select_query);
$count_rows=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);

//cart item
// $select_query_cart="select * from `card_details` where IP_Address='$ip'";
// $result_cart=mysqli_query($conn,$select_query_cart);
// $count_rows_cart=mysqli_num_rows($result_cart);
// $row_cart=mysqli_fetch_assoc($result);
if($count_rows>0){
  $_SESSION['username']=$username;
  if(password_verify($password,$row['password'])){
    // echo "<script>alert('login successfully')</script>";
    //$count_rows==1: that means the user is logged in succefully
    //$count_rows_cart==0: the user have not any item in the cart
    // if($count_rows==1 and $count_rows_cart==0){
    //   $_SESSION['username']=$username;
        //redirected to the user profile
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
//     }
//     else{
//       $_SESSION['username']=$username;
//       //redirect to the payment page
//       echo "<script>alert('login successfully')</script>";
//         echo "<script>window.open('payment.php','_self')</script>";
//     }
//   }else{
//     echo "<script>alert('invalid credential')</script>";
//   }

}
else{
  echo "<script>alert('invalid credential')</script>";
}
// echo $result;
}

}
?>