<?php
//  $cattitle=$_POST['cat_title'];
 $conn=mysqli_connect('localhost','root','','new-ecommerce');
if($conn)
{
// echo "connect";
// die(mysqli_connect_error($conn));
}
else{
    die(mysqli_connect_error($conn));
}
//  $stmt=$conn->prepare("insert into insert_category(cat_titlle) values(?)");
// $stmt->bind_param("s",$cattitle);
// $stmt->execute();

// // echo " <script>alert('database connected successfully')</script> ";
// $stmt->close();
// $conn->close();

?>