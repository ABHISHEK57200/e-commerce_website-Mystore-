<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
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
    $ip = getIPAddress();
     //currently inserted value
  // select the data from the database
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $ConfirmPassword=$_POST['ConfirmPassword'];
  // $product_brand=$_POST['brand_id'];
  $password_hash=password_hash($password,PASSWORD_DEFAULT);
  
  $image=$_FILES['user_image']['name'];
  $tmp_img=$_FILES['user_image']['tmp_name'];
  $address=$_POST['address'];
  $mobile=$_POST['mobile'];
  // $product_status=$_POST['product_status'];
//if any of the field is empty then we have give like below message
  if($username=='' 	Or $email=='' 	Or  $password=='' 	Or  $image==''	Or  $address==' '	Or $mobile==''){
    echo "<script> alert('please fill all the field')</script>";
    exit();
  }
  else
  {
    move_uploaded_file($tmp_img,"C:/xamppp/htdocs/new _e_commerce/upload_image/ $image");
    
    // $insert_query1="insert into `product`(	Product_Title	,Product_Description	,Product_keyword	,category_id,	brand_id	,product_image1	,product_image2	,product_image3,	product_price,	date	,status) values('$product_title','$product_desc','$product_key','$product_cat','$product_brand','$prduct_img1','$prduct_img2','$prduct_img3','$product_price','$product_date','$product_status')";
    // $results=mysqli_query($conn, $insert_query1);
    // if($results){
    //   echo" <script>alert('product is inserted successfully')</script>";
    // }
  }
  
  
 
  $select_query="select * from  user_table where  username='$username'  Or userEmail='$email'";
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
  
  $insert_query="insert into `user_table`(username,userEmail,password,user_ip,userImg,address,mobileNumber)
   values('$username','$email','$password_hash','$ip','$image','$address','$mobile')";
  $result=mysqli_query($conn, $insert_query);
  // $stmt->bind_param("s",$cattitle);
  // $stmt->execute();
  // $stmt->close();
  if($result){
      echo " <script>alert('data is inserted  successfully')</script>";
      echo " <script>window.open('login.php','_self')</script>";
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
      <input type="text" class="form-control" id="inputEmail3" name="username">
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
  <div class="row mb-3">
    <label for="inputimage3" class="col-sm-2 col-form-label" >image</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="inputimage3" name="user_image">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputaddress3" class="col-sm-2 col-form-label">addreess</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputaddress3" name="address">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputmobile3" class="col-sm-2 col-form-label">mobile number</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputmobile3" name="mobile">
    </div>
  </div>
  <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" name="registration" placeholder="registration" class="bg-info p-2 border-1">
        </div>
  <!-- <button type="submit" class="btn btn-primary" style="position: relative;left:40%">Register</button> -->
</form>
<p>have you already registered?<a href="login.php">login</a> </p>
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