<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-center text-danger">delete account</h1>
    <form action="" method="post">
        <div class="form-outline m-auto w-50 mb-4 mt-5">
            <input type="submit" name="deleteAccount" value="delete account" class=" form-control ">

        </div>
        <div class="form-outline m-auto w-50">
            <input type="submit" value="don't delete account" name="explore" class=" form-control ">
        </div>
    </form>
</body>
</html>
<?php
$username=$_SESSION['username'];
if(isset($_POST['deleteAccount'])){
    $delete_query="delete from user_table where username='$username'";
    $resultQuery=mysqli_query($conn,$delete_query);
    echo "<script>alert('acconut deleted successfully')</script>";
    echo "<script>window.open('logout.php','_self')</script>";

}
if(isset($_POST['explore'])){

    echo "<script>window.open('iidex.php','_self')";
}
?>
