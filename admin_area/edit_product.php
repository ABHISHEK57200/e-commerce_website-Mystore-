<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_product</title>
    <style>
        .updateImg{
            height:60px;
            width:70px;
        }
    </style>
</head>
<body>
    <?php
if(isset($_GET['edit_product']))
{
$product_value=$_GET['edit_product'];
// echo "this is the product value".$product_value;
$select_product="select * from `product` where product_id=$product_value";
$product_result=mysqli_query($conn,$select_product);
$product_row=mysqli_fetch_assoc($product_result);
$producttitle=$product_row['Product_Title'];
$produt_desc=$product_row['Product_Description'];
$product_key=$product_row['Product_keyword'];
$categoryid=$product_row['category_id'];
$brandid=$product_row['brand_id'];
$image1=$product_row['product_image1'];
$image2=$product_row['product_image2'];
$image3=$product_row['product_image3'];
$product_price=$product_row['product_price'];
//fetchin category name
$select_category="select * from `insert_category` where id=$categoryid";
$category_result=mysqli_query($conn,$select_category);
//fetchin  brand
$select_brand="select * from `brand` where 	brand_id=$brandid";
$brand_result=mysqli_query($conn,$select_brand);
// echo $image2;

if(isset($_POST['product_update'])){
    $new_product_title=$_POST['product_title'];
    $new_product_desc=$_POST['productdisc'];
    $new_product_key=$_POST['productKey'];
    // $new_product_category=$_POST['category'];
    // $new_product_brand=$_POST['brand'];
    $new_product_image1=$_FILES['image1']['name'];
    $new_product_image2=$_FILES['image2']['name'];
    $new_product_image3=$_FILES['image3']['name'];
    $new_product_tmp_image1=$_FILES['image1']['tmp_name'];
    $new_product_tmp_image2=$_FILES['image2']['tmp_name'];
    $new_product_tmp_image3=$_FILES['image3']['tmp_name'];
    $new_product_price=$_POST['product_price'];
    move_uploaded_file($new_product_tmp_image1,"../upload_image/ $new_product_image1");
    move_uploaded_file($new_product_tmp_image2,"../upload_image/$new_product_image2");
    move_uploaded_file($new_product_tmp_image3,"../upload_image/$new_product_image3");
    $update_product="update `product` set Product_Title='$new_product_title',Product_Description='$new_product_desc',
    Product_keyword='$new_product_key',brand_id=$brandid,category_id=$categoryid,
    product_image1='$new_product_image1',product_image2='$new_product_image2',product_image3='$new_product_image3',product_price='$new_product_price'where product_id=$product_value ";
    $update_result=mysqli_query($conn,$update_product);
    if($update_result){
        echo "<script>alert('product is updated successfully')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
    }
    }
    
}
// if(isset($_POST['product_update']))
?>
    <h2>edit product</h2>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <label for="">product title</label>
            <input type="text" value="<?php echo $producttitle;?>" class="form-control w-50 m-auto" name="product_title">
        </div>
        <div class="form-outline mb-4">
            <label for="">product discription</label>
            <input type="text" value="<?php echo $produt_desc;?>" class="form-control w-50 m-auto" name="productdisc">
        </div>
        <div class="form-outline mb-4">
            <label for="">product keyword</label>
            <input type="text" value="<?php echo $product_key;?>" class="form-control w-50 m-auto" name="productKey">
        </div>
        <div class="form-outline mb-4">
            <select name="category" id="" class="form-control w-50 m-auto">
                <option value="">select</option>
                
                <?php
                while($brand_row=mysqli_fetch_assoc($brand_result)){
                    $brand_title=$brand_row['brand_title'];
                    echo "<option >$brand_title</option>";
                }
                ?>
            </select>
            
        </div>
        <div class="form-outline mb-4">
            <select name="brand" id="" class="form-control w-50 m-auto">
                <option value="">select</option>
                <?php 
                while($category_row=mysqli_fetch_assoc($category_result)){
                    $category_title=$category_row['cat_titlle'];
                    echo "<option >$category_title</option>";
                }
                ?>

                <!-- <option value="">kela</option> -->
            </select>
            
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <label for="">image1</label>
            <input type="file"  class="form-control m-auto " name="image1" height="30px">
            <img src="../upload_image/ <?php echo $image1; ?>" alt="" class="updateImg">
          
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <label for="">image2</label>
            <input type="file"  class="form-control m-auto " name="image2" height="30px">
            <img src="../upload_image/ <?php echo $image2; ?>" alt="" class="updateImg">
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <label for="">image3</label>
            <input type="file"  class="form-control m-auto " name="image3" height="30px">
            <img src="../upload_image/ <?php echo $image3; ?>" alt="" class="updateImg">
        </div>
        <div class="form-outline mb-4">
            <label for="">product price</label>
            <input type="text" value="<?php echo $product_price;?>" class="form-control w-50 m-auto" name="product_price">
        </div>
      
        <input type="submit" class="py-2 px-2 border-0 text-center bg-info" name="product_update" value="update">
    </form>

</body>
</html>
<?php

?>

