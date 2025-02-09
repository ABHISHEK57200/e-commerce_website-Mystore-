<?php
include ('./admin_area/catDB.php');
// include('iidex.php');
function getProducts(){
    global $conn;
    if(!isset($_GET['cat_id'])){
        if(!isset($_GET['brand'])){
        $select_query="select * from `product` order by rand()";// showing the product randamly by using rand function
          $result=mysqli_query($conn,$select_query);
          // $row=mysqli_fetch_assoc($result);
          while($row=mysqli_fetch_assoc($result)){
            $product_id= $row['product_id'];
            $product_title= $row['Product_Title'];
            $product_description= $row['Product_Description'];
            // $product_keyword= $row['product_id'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            // $product_image2= $row['product_image1'];
            // $product_image3= $row['product_image1'];
            $product_id= $row['product_id'];
            $product_price=$row['product_price'];
            // echo "$product_image1";
            // $product_id= $row['product_id'];
            // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
            echo "  <div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
  <img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'> $product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>price: $product_price /-</p>
    <a href='iidex.php ? Add_To_Cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <a href='product_details.php ? product_id=$product_id' class='btn btn-primary'>View more</a>
  </div>
</div>
        </div>";
          }
        }
      }

      
      
} 
function get_unique_id(){
    // echo "we are in the unique function";
    global $conn;
if(isset($_GET['cat_id']))//ye chij samajh nhi aa rha hai ki ye category kha se aa rha hai aur brand
 {
    // echo "we are in the categry";

    $category_id1=$_GET['cat_id'];
    $select_query="select * from `product` where category_id=$category_id1";// showing the product randamly by using rand function
      $result=mysqli_query($conn,$select_query);
      $no_of_rows=mysqli_num_rows($result);
      if($no_of_rows==0){
        echo "<h1>there is no stock of that ctegory<h/1>";
      }
      // $row=mysqli_fetch_assoc($result);

      while($row=mysqli_fetch_assoc($result)){
        $product_id= $row['product_id'];
        $product_title= $row['Product_Title'];
        $product_description= $row['Product_Description'];
        // $product_keyword= $row['product_id'];
        $category_id= $row['category_id'];
        $brand_id= $row['brand_id'];
        $product_image1= $row['product_image1'];
        // $product_image2= $row['product_image1'];
        // $product_image3= $row['product_image1'];
        $product_id= $row['product_id'];
        $product_price=$row['product_price'];
        // echo "$product_image1";
        // $product_id= $row['product_id'];
        // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
        echo "  <div class='col-md-4'>
    <div class='card' style='width: 18rem;'>
<img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'> $product_title</h5>
<p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price /-</p>
<a href='iidex.php ? Add_To_Cart=$product_id' class='btn btn-primary'>Add to cart</a>
  <a href='product_details.php ? product_id=$product_id' class='btn btn-primary'>View more</a>
</div>
</div>
    </div>";
      }
     
      
    }
}

//brand

function get_unique_brands(){
  // echo "we are in the unique function";
  global $conn;
if(isset($_GET['brand']))//ye chij samajh nhi aa rha hai ki ye category kha se aa rha hai aur brand
{
  // echo "we are inside brand";

  $brands_id=$_GET['brand'];
  $select_query="select * from `product` where brand_id=$brands_id";// 
    $result=mysqli_query($conn,$select_query);
    $no_of_rows=mysqli_num_rows($result);
    if($no_of_rows==0){
      echo "<h1 class='text-center text-primary'>this brand is not available for service<h/1>";
    }
    // $row=mysqli_fetch_assoc($result);

    while($row=mysqli_fetch_assoc($result)){
      $product_id= $row['product_id'];
      $product_title= $row['Product_Title'];
      $product_description= $row['Product_Description'];
      // $product_keyword= $row['product_id'];
      $category_id= $row['category_id'];
      $brand_id= $row['brand_id'];
      $product_image1= $row['product_image1'];
      // $product_image2= $row['product_image1'];
      // $product_image3= $row['product_image1'];
      $product_id= $row['product_id'];
      $product_price=$row['product_price'];
      // echo "$product_image1";
      // $product_id= $row['product_id'];
      // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
      echo "  <div class='col-md-4'>
  <div class='card' style='width: 18rem;'>
<img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'> $product_title</h5>
<p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price /-</p>
<a href='iidex.php ? Add_To_Cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a href='product_details.php ? product_id=$product_id' class='btn btn-primary'>View more</a>
</div>
</div>
  </div>";
    }
   
    
  }
}

//searching product
function search_product()
{
  global $conn;
 
  // $search_data_products=$_GET['search_data_product'];
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];//jo bhi value input box m dalenge wo is valiable me store ho jayega
  $select_query="select * from `product` where Product_keyword like '%$search_data_value%'";//% MEANS data kisi bhi posistion par rhega wo use access ker lega
  $result=mysqli_query($conn,$select_query); 
  $no_of_rows=mysqli_num_rows($result);
  if($no_of_rows==0){
    echo "<h1>the product is not available</h1>";
  }

  // $select_query="select * from `product` order by rand()";// showing the product randamly by using rand function
  //         $result=mysqli_query($conn,$select_query);
          // $row=mysqli_fetch_assoc($result);
          while($row=mysqli_fetch_assoc($result)){
            $product_id= $row['product_id'];
            $product_title= $row['Product_Title'];
            $product_description= $row['Product_Description'];
            // $product_keyword= $row['product_id'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            // $product_image2= $row['product_image1'];
            // $product_image3= $row['product_image1'];
            $product_id= $row['product_id'];
            $product_price=$row['product_price'];
            // echo "$product_image1";
            // $product_id= $row['product_id'];
            // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
            echo "  <div class='col-md-4'>
        <div class='card' style='width: 18rem;'>
  <img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'> $product_title</h5>
    <p class='card-text'>$product_description</p>
      <p class='card-text'>price: $product_price /-</p>
    <a href='iidex.php ? Add_To_Cart=$product_id' class='btn btn-primary'>Add to cart</a>
     <a href='product_details.php ? product_id=$product_id' class='btn btn-primary'>View more</a>
  </div>
</div>
        </div>";
          }
  

}
}

function productDetails(){

  //  echo "we are in the unique function";
   global $conn;
   if(isset($_GET['product_id']))//ye chij samajh nhi aa rha hai ki ye category kha se aa rha hai aur brand
    {
       // echo "we are in the categry";
   
       $category_id1=$_GET['product_id'];
       $select_query="select * from `product` where product_id=$category_id1";// showing the product randamly by using rand function
         $result=mysqli_query($conn,$select_query);
         $no_of_rows=mysqli_num_rows($result);
         if($no_of_rows==0){
           echo "<h1>there is no stock of that ctegory<h/1>";
         }
         // $row=mysqli_fetch_assoc($result);
   
         while($row=mysqli_fetch_assoc($result)){
           $product_id= $row['product_id'];
           $product_title= $row['Product_Title'];
           $product_description= $row['Product_Description'];
           // $product_keyword= $row['product_id'];
           $category_id= $row['category_id'];
           $brand_id= $row['brand_id'];
           $product_image1= $row['product_image1'];
           $product_image2= $row['product_image2'];
           $product_image3= $row['product_image3'];
           $product_id= $row['product_id'];
           $product_price=$row['product_price'];
           // echo "$product_image1";
           // $product_id= $row['product_id'];
           // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
          // echo "hello";
           echo "  <div class='col-md-4'>
       <div class='card' style='width: 18rem;'>
   <img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>


   <div class='card-body'>
   <h5 class='card-title'> $product_title</h5>
   <p class='card-text'>$product_description</p>
   <p class='card-text'>price: $product_price /-</p>
   <a href='iidex.php ? Add_To_Cart=$product_id' class='btn btn-primary'>Add to cart</a>
   <a href='iidex.php' class='btn btn-primary'>Go Home</a>
   </div>
   </div>
       </div>";
       echo " <div class='' style='width: 18rem;'>
       <img src='./upload_image/ $product_image2' class='card-img-top' alt='$product_title'>
       </div>";
       echo " <div class='' style='width: 18rem;'>
       <img src='./upload_image/ $product_image3' class='card-img-top' alt='$product_title'>
       </div>";

         }
        
         
       }
   }
   
// get ip address
function getIpAddress(){
  //whether ip is from the share internet  
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
    $ip = $_SERVER['HTTP_CLIENT_IP'];  
}  
//whether ip is from the proxy  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
}  
//whether ip is from the remote address  
else{  
 $ip = $_SERVER['REMOTE_ADDR'];  
}  
return $ip;  
}  


//add to cart funtion
function Cart(){
  global $conn;
  if(isset($_GET['Add_To_Cart']))
  {
  
    $ip = getIPAddress();//whent this function is called it provide an unique ip adddress which is store inside the vaiable
    $product_id=$_GET['Add_To_Cart'];
    $select_query="Select * from card_details where IP_Address='$ip' and Product_id=$product_id";
    $result_Query=mysqli_query($conn,$select_query); 
    $no_of_rows=mysqli_num_rows($result_Query);
    if($no_of_rows>0){
      echo "<script>alert('data is already present')</script>";
      // afetr alert message if you rediret to the same page then apply this
      echo "<script>window.open('iidex.php','_self')</script>";
    }
    else{
      $insert_query="insert into card_details(Product_id,IP_Address,Quantity) values($product_id,'$ip',1)";
      $result=mysqli_query($conn,$insert_query);
      echo "<script>window.open('iidex.php','_self')</script>";
    }
  
  }
}
// function to get cart details
function cart_detail(){
  global $conn;
  if(isset($_GET['Add_To_Cart']))
  {
  
    $ip = getIPAddress();//whent this function is called it provide an unique ip adddress which is store inside the vaiable
    // $product_id=$_GET['Add_To_Cart'];
    $select_query="Select * from card_details where IP_Address='$ip'";
    $result_Query=mysqli_query($conn,$select_query); 
    $no_of_rows=mysqli_num_rows($result_Query);
   
  
  }
  else{
    $ip = getIPAddress();
    $select_query="Select * from card_details where IP_Address='$ip' ";
    $result_Query=mysqli_query($conn,$select_query); 
    $no_of_rows=mysqli_num_rows($result_Query);
  }
  echo $no_of_rows;


  
}

//total price function
function price_details(){
  global $conn;
  $ip = getIPAddress();
  $select_query="select * from `card_details` where 	IP_Address='$ip'";
  $result=mysqli_query($conn,$select_query);
  $totalPrice=0;
  while($row=mysqli_fetch_array($result))
  {
    $productId=$row['Product_id'];
    $IPAddress=$row['IP_Address'];
    $quantity=$row['Quantity'];
    $select_product_query="select * from product where product_id='$productId'";
    $results=mysqli_query($conn,$select_product_query);
    while($rows=mysqli_fetch_assoc($results)){
      $price=array($rows['product_price']);
      $product_vlues=array_sum($price);//
      $totalPrice+=$product_vlues*$quantity;//
    //  echo $product_vlues." ";
    //  echo $price;
    }
   
  }
  echo $totalPrice; 

}


// Add to card details information

 function CardInformation(){
  global $conn;
  $ip = getIPAddress();
  $select_query="select * from `card_details` where 	IP_Address='$ip'";
  $result=mysqli_query($conn,$select_query);
  $count_result=mysqli_num_rows($result);
  if($count_result>0){
    echo  "<tr>
    <th scope='col'>product title</th>
    <th scope='col'>product imagee</th>
    <th scope='col'>quantity</th>
    <th scope='col'>total price</th>
    <th scope='col'>remove</th>
    <th scope='col' colspan='3'>operation</th>
  </tr>";
  $totalPrice=0;
  while($row=mysqli_fetch_array($result))
  {
    $productId=$row['Product_id'];
    $IPAddress=$row['IP_Address'];
    $quantity=$row['Quantity'];
    $select_product_query="select * from product where product_id='$productId'";
    $results=mysqli_query($conn,$select_product_query);
  //   echo  "<tr>
  //   <th scope='col'>product title</th>
  //   <th scope='col'>product imagee</th>
  //   <th scope='col'>quantity</th>
  //   <th scope='col'>total price</th>
  //   <th scope='col'>remove</th>
  //   <th scope='col' colspan='3'>operation</th>
  // </tr>";

    while($rows=mysqli_fetch_assoc($results)){
      $product_title=$rows['Product_Title'];
      $product_image=$rows['product_image1'];
      $product_price=$rows['product_price'];
      // $product_title=$rows['Product_Title'];
      // echo   $product_title." ";  
    //  echo $product_vlues." ";
    //  echo $price;

    echo " 
      <form method='post' action=''>
     <tr>
      <th scope='row'>$product_title</th>
      <td><img src='./upload_image/ $product_image' height='80px' width='100px' ></td>
      <td><input type='text' size='10px' name='qty'></td>
      <td>$product_price</td>
      <td><input type='checkbox' id='remove' name='remove' value='$productId' ></td>
      <input type='hidden' name='product_id' value='$productId'>
      <td> <input type='submit' value='update' name='quantity_Update' class='bg-info px-3 py-3 border-0'></td>
      <td> <input type='submit' value='remove' name='product_remove' class='bg-info px-3 py-3 border-0'></td>
      

    </tr>
    </form>";
    
    }
   
    
  }
  //update the quantity in the card details table
  if(isset($_POST['quantity_Update'])){
    if (isset($_POST['qty']) && is_numeric($_POST['qty']) && $_POST['qty'] > 0) {
    $insert_quantity=$_POST['qty'];
    $productId=$_POST['product_id'];
    // $update_query="UPDATE card_details SET Quantity = $insert_quantity WHERE Product_id= '$productId' and IP_Address='$ip'";
    $update_query = "UPDATE card_details SET Quantity = $insert_quantity WHERE Product_id = '$productId' AND IP_Address = '$ip'";
    $result = mysqli_query($conn, $update_query);
    echo " <script> window.open('Add_To_Cart.php','_self')</script>";
 }
  }

// remove the product from the add to cart table

if(isset($_POST['product_remove'])){
  if (isset($_POST['remove']) && is_numeric($_POST['remove']) && $_POST['remove'] > 0) {
  $insert_quantity=$_POST['remove'];
  $productId=$_POST['product_id'];
  // $update_query="UPDATE card_details SET Quantity = $insert_quantity WHERE Product_id= '$productId' and IP_Address='$ip'";
  $update_query = "DELETE FROM card_details  WHERE Product_id = '$insert_quantity' AND IP_Address = '$ip'";
  $result = mysqli_query($conn, $update_query);
  echo " <script> window.open('Add_To_Cart.php','_self')</script>";
}
}

  
}
 }

 //checkout funtionlity=>if the user click on the checlout button the page is 
 //redirected to the payment option otherwise redirected to the login page ,
 //if the uder is not register then first it woud be register then loggin with his or her user name and password


 
 //order pending function
 // this function is called inside the profile.php
 function get_order_pending_details(){
  global $conn;
  $username=$_SESSION['username'];
  $select_pending="select * from `user_table` where username='$username'";
  $result2=mysqli_query($conn,$select_pending);
  while($row_query=mysqli_fetch_assoc($result2)){
    $userId=$row_query['userId'];
    if(!isset($_GET['edit_acc'])){
      if(!isset($_GET['My_orders']))
      {
        if(!isset($_GET['delete'])){
          $select_order="select * from `order` where user_id=$userId";
          $result3=mysqli_query($conn,$select_order);
          $count_row=mysqli_num_rows($result3);
          if($count_row>0){
            echo "<h4 class='text-center text-success'>you have <span class='text-danger' >$count_row</span> pending </h4> 
            <p class='text-center'><a href='profile.php?My_orders'>order_details</a></p>";
          }
          else{
            echo "<h4 class='text-center text-success'>you have zero pending </h4> 
            <p class='text-center'><a href='iidex.php'>explore more</a></p>";
          }
        }
      }
    }
  }
 }

?>
