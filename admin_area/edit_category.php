<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $select_query3="select * from insert_category where id=$category_id";
    $result3=mysqli_query($conn,$select_query3);
    $rows=mysqli_fetch_assoc($result3);
    $category_title=$rows['cat_titlle'];
    if(isset($_POST['update_category']))
    {
        $cat_title=$_POST['cat_title'];
        $update_query="update insert_category set cat_titlle='$cat_title' where id=$category_id";
        $result4=mysqli_query($conn,$update_query);

        echo "<script>alert('category updated successfully')
        window.open('index.php','_self')</script>";
    }

}
?>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
<div class="form-outline mb-4">
            <label for=""></label>
            <input type="text" value="<?php echo $category_title;?>" class="form-control w-50 m-auto" name="cat_title">
        </div>
      
        <input type="submit" class="py-2 px-2 border-0 text-center bg-info" name="update_category" value="update">
    </form>
    
</body>
</html>