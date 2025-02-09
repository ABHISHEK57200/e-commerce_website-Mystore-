<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    $select_query3="select * from `brand` where brand_id= $brand_id";
    $result4=mysqli_query($conn,$select_query3);
    $rows=mysqli_fetch_assoc($result4);
    $brand_title=$rows['brand_title'];
    if(isset($_POST['update_brand']))
    {
        $brands_title=$_POST['brands_title'];
        $update_query="update `brand` set brand_title='$brands_title' where brand_id=$brand_id";
        $result5=mysqli_query($conn,$update_query);

        echo "<script>alert('brand updated successfully')
        window.open('index.php','_self')</script>";
    }

}
?>
<h1 class="text-center coror-primary">edit brand</h1>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
<div class="form-outline mb-4">
            <label for=""></label>
            <input type="text" value="<?php echo $brand_title;?>" class="form-control w-50 m-auto" name="brands_title">
        </div>
      
        <input type="submit" class="py-2 px-2 border-0 text-center bg-info" name="update_brand" value="update">
    </form>
    
</body>
</html>