<!-- <?php
// include('catDB.php');
// // include('common_function/functions.php');
// ?>
// <?php
// if(isset($_POST['submit'])){
//     $username=$_POST['username'];
//     $emailid=$_POST['email'];
//     $password=$_POST['password'];
//     $cpassword=$_POST['cpassword'];
//     $password_hash=password_hash($password,PASSWORD_DEFAULT);
//     if($username=='' Or $emailid=='' Or  $password=='' ){
//         echo "<script> alert('please fill all the field')</script>";
//         exit();
//       }

//     $select_query="select * from  admin_table where  userName='$username'  Or Email='$emailid'";
//     $result_select=mysqli_query($conn, $select_query);
//     $numbers=mysqli_num_rows($result_select); // it gat the number of rows in particular result
//     // $stmt=$conn->prepare("insert into insert_category(cat_titlle) values(?)");
//     if($numbers>0){
//       echo" <script>alert('data is already present')</script>";
//     }
//     elseif($password!=$ConfirmPassword){
//       echo "<script> alert('the password are not same')";
//     }
//     else{
//         // echo" <script>alert('data is inserted sucessfuly')</script>";
    
//     $insert_query="insert into `admin_table`(userName,Email,password)
//      values('$username','$email','$password_hash')";
//     $result=mysqli_query($conn, $insert_query);
//     // $stmt->bind_param("s",$cattitle);
//     // $stmt->execute();
//     // $stmt->close();
//     if($result){
//         echo " <script>alert('data is inserted  successfully')</script>";
//     }
//   }
// }
// ?>

<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
    <form action="" method="POST">
      <div class="formbold-form-title">
        <h2 class="">Register now</h2>
       
      </div>

      <div class="formbold-input">
        
        <div>
          <label for="lastname" class="formbold-form-label">username</label>
          <input type="text" name="uname" id="aminname" class="formbold-form-input" />
        </div>
      </div>
      <div class="formbold-input">
        <div>
          <label for="email" class="formbold-form-label"> username </label>
          <input
            type="text"
            name="username"
            id="user"
            class="formbold-form-input"
          />
        </div>
        </div>
      <div class="formbold-input">
        <div>
          <label for="email" class="formbold-form-label"> Email </label>
          <input
            type="email"
            name="email"
            id="email"
            class="formbold-form-input"
          />
        </div>
        </div>
        <div class="formbold-input">
        <div>
          <label for="password" class="formbold-form-label"> password</label>
          <input
            type="password"
            name="password"
            id="cpassword"
            class="formbold-form-input"
          />
        </div>
        </div>
        <div class="formbold-input">
        <div>
          <label for="email" class="formbold-form-label"> confirm password </label>
          <input
            type="password"
            name="cpassword"
            id="cpassword"
            class="formbold-form-input"
          />
        </div>
        </div>
      <input  type="submit" class="formbold-btn" name="submit" placeholder="register now">
    </form>
  </div>
</div>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }
  .formbold-relative {
    position: relative;
  }
  .formbold-opacity-0 {
    opacity: 0;
  }
  .formbold-stroke-current {
    stroke: currentColor;
  }
  #supportCheckbox:checked ~ div span {
    opacity: 1;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-img {
    margin-bottom: 45px;
  }

  .formbold-form-title {
    margin-bottom: 30px;
  }
  .formbold-form-title h2 {
    font-weight: 600;
    font-size: 28px;
    line-height: 34px;
    color: #07074d;
  }
  .formbold-form-title p {
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    margin-top: 12px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    text-align: center;
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #536387;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }

  .formbold-checkbox-label {
    display: flex;
    cursor: pointer;
    user-select: none;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-checkbox-label a {
    margin-left: 5px;
    color: #6a64f1;
  }
  .formbold-input-checkbox {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
  .formbold-checkbox-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    margin-right: 16px;
    margin-top: 2px;
    border: 0.7px solid #dde3ec;
    border-radius: 3px;
  }

  .formbold-btn {
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
</style> --><?php
include('catDB.php');
// include('common_function/functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
    <meta charset="UTF-8"  content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body >
  <?php
  if(isset($_POST['registration'] ))
  {
    // $ip = getIPAddress();
     //currently inserted value
  // select the data from the database
  $username=$_POST['usernames'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $ConfirmPassword=$_POST['ConfirmPassword'];
  // $product_brand=$_POST['brand_id'];
  $password_hash=password_hash($password,PASSWORD_DEFAULT);

  // $product_status=$_POST['product_status'];
//if any of the field is empty then we have give like below message
  if($username=='' 	Or $email=='' 	Or  $password==''){
    echo "<script> alert('please fill all the field')</script>";
    exit();
  }
  
  
 
  $select_query="select * from  `admin_table` where  username='$username'  Or Email='$email'";
  $result_select=mysqli_query($conn, $select_query);
  $numbers=mysqli_num_rows($result_select); // it gat the number of rows in particular result
  // $stmt=$conn->prepare("insert into insert_category(cat_titlle) values(?)");
  if($numbers>0){
    echo" <script>alert('data is already present')</script>";
  }
  // elseif($password!=$ConfirmPassword){
  //   echo "<script> alert('the password are not same')";
  // }
  else{
      // echo" <script>alert('data is inserted sucessfuly')</script>";
  
  $insert_query="insert into `admin_table`(userName,Email,password)
   values('$username','$email','$password_hash')";
  $result=mysqli_query($conn, $insert_query);
  // $stmt->bind_param("s",$cattitle);
  // $stmt->execute();
  // $stmt->close();
  if($result){
      echo " <script>alert('data is inserted  successfully')</script>";
  }
}
}
  ?>
  <h2 style="text-align:center">new registration</h2><br>

    <div style="justify-content: center;position:relative;left: 100px;" >
  <form method="post" action=" " enctype="multipart/form-data" onsubmit="return validatePassword()">
     <div class="row mb-3 ">
    <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" name="usernames">
    </div>
  </div>
  <div class="row mb-3 d-flex">
    <label for="inputPassword3" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="inputPassword3" name="email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">confirm password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="confirmPassword" name="ConfirmPassword">
    </div>
    <p id="message" style="color:red; text-align:center"></p>
  </div>

  <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" name="registration" placeholder="registration" class="bg-info p-2 border-1">
        </div>
  <!-- <button type="submit" class="btn btn-primary" style="position: relative;left:40%">Register</button> -->
</form>
<p>have you already registered? <a href="admin_login.php">Login</a> </p>
</div>


<script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password != confirmPassword) {
                document.getElementById("message").textContent = "Passwords do not match!";
                return false; // Prevent form submission
            } else {
                document.getElementById("message").textContent = "";
                return true; // Allow form submission
            }
        }
    </script>
</body>
</html>