<?php
include('catDB.php');

   
    if(isset($_POST['insert_product'] ))
    {
       //currently inserted value
    // select the data from the database
    $product_title=$_POST['Product_Title'];
    $product_desc=$_POST['Product_Description'];
    $product_key=$_POST['Product_keyword'];
    $product_cat=$_POST['category_id'];
    $product_brand=$_POST['brand_id'];
    
    $prduct_img1=$_FILES['product_image1']['name'];
    $prduct_img2=$_FILES['product_image2']['name'];
    $prduct_img3=$_FILES['product_image3']['name'];

    $tmp_img1=$_FILES['product_image1']['tmp_name'];
    $tmp_img2=$_FILES['product_image2']['tmp_name'];
    $tmp_img3=$_FILES['product_image3']['tmp_name'];
    $product_price=$_POST['product_price'];
    $product_date=$_POST['product_date'];
    $product_status=$_POST['product_status'];
//if any of the field is empty then we have give like below message
    if($product_title=='' 	Or $product_desc=='' 	Or $product_key=='' 	Or  $product_cat==''	Or  $product_brand==' '	Or $product_price==' '
    Or $product_date==''	Or $product_status==' ' 	Or $prduct_img1=='' 	Or $prduct_img2==''	Or $prduct_img3==''){
      echo "<script> alert('please fill all the field')</script>";
      exit();
    }
    else
    {
      move_uploaded_file($tmp_img1,"C:/xamppp/htdocs/new _e_commerce/upload_image/ $prduct_img1");
      move_uploaded_file($tmp_img2,"C:/xamppp/htdocs/new _e_commerce/upload_image/ $prduct_img2");
      move_uploaded_file($tmp_img3,"C:/xamppp\htdocs/new _e_commerce/upload_image/ $prduct_img3");
      // $insert_query1="insert into `product`(	Product_Title	,Product_Description	,Product_keyword	,category_id,	brand_id	,product_image1	,product_image2	,product_image3,	product_price,	date	,status) values('$product_title','$product_desc','$product_key','$product_cat','$product_brand','$prduct_img1','$prduct_img2','$prduct_img3','$product_price','$product_date','$product_status')";
      // $results=mysqli_query($conn, $insert_query1);
      // if($results){
      //   echo" <script>alert('product is inserted successfully')</script>";
      // }
    }
    
    
   
    $select_query="select *from  product where  Product_Title='$product_title'AND Product_Description=' $product_desc'AND Product_keyword='$product_key' AND category_id='$product_cat'AND brand_id=' $product_brand'AND product_image1='$prduct_img1' AND product_image2='$prduct_img2'AND product_image3='$prduct_img3'AND product_price='$product_price' AND date='$product_date'AND status='$product_status' ";
    $result_select=mysqli_query($conn, $select_query);
    $numbers=mysqli_num_rows($result_select); // it gat the number of rows in particular result
    // $stmt=$conn->prepare("insert into insert_category(cat_titlle) values(?)");
    if($numbers>0){
      echo" <script>alert('data is already present')</script>";
    }
    else{
        // echo" <script>alert('data is inserted sucessfuly')</script>";
    
    $insert_query="insert into `product`(	Product_Title	,Product_Description	,Product_keyword	,category_id,	brand_id	,product_image1	,product_image2	,product_image3,	product_price,	date	,status) values('$product_title','$product_desc','$product_key','$product_cat','$product_brand','$prduct_img1','$prduct_img2','$prduct_img3','$product_price','$product_date','$product_status')";
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    
    <div class="forms" style="height: auto; width:50%; margin-left:25%">
<h2 class="text-center">insert product</h2>
<form action="" method="post" enctype="multipart/form-data"><!-- the 'enctype' attribute use to take the multiple image from the your device and it submit on the server-->
<div class="form-outline mb-3">
  <label for="formGroupExampleInput" class="form-label">Product_Title</label>
  <input type="text" class="form-control width-50px" id="formGroupExampleInput" name="Product_Title" placeholder="enter product title">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Product_Description</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" name="Product_Description" placeholder="enter product description">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Product_keyword</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" name="Product_keyword" placeholder="enter keyword">
</div>

<select name="category_id" class="form-select" aria-label="Default select example">
<option selected>select_category</option>
<?php
          $select_brand='select * from insert_category';//selct all brand from the database
          $select_result=mysqli_query($conn, $select_brand);//execute the cselect brand
          // $select_rows=mysqli_fetch_assoc($select_result);// fetch the data from the rows,the select query fetch the data in array format
          // echo $select_rows['brand_title']//
          while($select_rows=mysqli_fetch_assoc($select_result)){
          $brand_title=$select_rows['cat_titlle'] ;
          $category_id=$select_rows['id'];
          // echo $brand_title;
          echo "<option value='$category_id' >$brand_title</option>";
          }
          ?>
</select><br>
<select name="brand_id" class="form-select" aria-label="Default select example">
  <option selected>select_brand</option>
  <?php
          $select_brand='select * from brand';//selct all brand from the database
          $select_result=mysqli_query($conn, $select_brand);//execute the cselect brand
          // $select_rows=mysqli_fetch_assoc($select_result);// fetch the data from the rows,the select query fetch the data in array format
          // echo $select_rows['brand_title']//
          while($select_rows=mysqli_fetch_assoc($select_result)){
          $brand_title=$select_rows['brand_title'] ;
          $brand_id=$select_rows['brand_id'];
          // echo $brand_title;
          echo "<option value='$brand_id' >$brand_title</option>";
          }
          ?>
</select>

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product image1</label>
  <input type="file" class="form-control" id="formGroupExampleInput" name="product_image1" placeholder="choose the imge">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product image2</label>
  <input type="file" class="form-control" id="formGroupExampleInput" name="product_image2"  placeholder="choose the imge">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product image3</label>
  <input type="file" class="form-control" id="formGroupExampleInput" name="product_image3"  placeholder="choose the imge">
</div>
<div class="form-outline mb-3">
  <label for="formGroupExampleInput" class="form-label">Product_price</label>
  <input type="text" class="form-control width-50px" id="formGroupExampleInput" name="product_price" placeholder="enter product title">
</div>
<div class="form-outline mb-3">
  <label for="formGroupExampleInput" class="form-label">Product_date</label>
  <input type="date" class="form-control width-50px" id="formGroupExampleInput" name="product_date" placeholder="enter product title">
</div>
<div class="form-outline mb-3">
  <label for="formGroupExampleInput" class="form-label">Product_status</label>
  <input type="text" class="form-control width-50px" id="formGroupExampleInput" name="product_status" placeholder="enter product title">
</div>

<div class="input-group w-10 mb-2 m-auto">
            <input type="submit" name="insert_product" placeholder="submit" class="bg-info p-2 border-1">
        <!-- <button type="submit" class="bg-info p-2 border-1"> view category</button> -->
        </div>
</form>  
</div>

<div>
  <?php
  $res=mysqli_query($conn,"select product_image1 from product");
  while($cols=mysqli_fetch_assoc($res)){
    ?>
    <img src="C:\upload_image\<?php echo $cols['product_image1']?>/>
  <?php }
  ?>
</div>

</body>
</html>
