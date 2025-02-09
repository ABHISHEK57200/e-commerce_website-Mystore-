
<?php
include('catDB.php');
include('../common_function/functions.php');
@session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="styling.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid p=0" >

        <a class="navbar-brand" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToevGCFiTW0VUYOtVQvifFptvuDRDYKJ0_2g&s" alt="" class="logo">
        </a>
        <!-- <h5>hi seema</h5> --><?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='#'>welcome guest!</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='#'>".$_SESSION['username']."</a>
          </li>";
            
          }

          
          ?>
    </div>
    </nav>
    <h1 class="text-center">Manage Details</h1>
    <nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid p=0" >

        <a class="navbar-brand" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToevGCFiTW0VUYOtVQvifFptvuDRDYKJ0_2g&s" alt="" class="logo">
        </a>
        <div class="collapse navbar-collapse padding=0" id="navbarSupportedContent"  >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="insert_product.php">insert_product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_product">view product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?insert_categories">insert_categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_category">view category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?insert-brand">insert-brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_brand">view brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?all_order">all brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?payment">payment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?user_list">users list</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">logout</a>
          </li> -->
          <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='admin_login.php'> Login</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='admin_logout.php'> logout</a>
          </li>";
          }
          ?>
          </ul>
    </div>
    </nav>
   
    <div class="container my-3">
    <?php
     if(isset($_GET['insert_categories'])){
     include "insert_category.php";
     }
     if(isset($_GET['insert-brand']))
     {
      include "insert-brand.php";
     }
      if(isset($_GET['view_product'])){
        include 'view_product.php';
      }
   if(isset($_GET['edit_product'])){
    include "edit_product.php";
   }
   if(isset($_GET['delete_product'])){
    include "delete_product.php";
   }
   if(isset($_GET['view_category'])){
    include 'view_category.php';
   }
   if(isset($_GET['edit_category'])){
    include 'edit_category.php';
   }
   if(isset($_GET['delete_category'])){
    include 'delete_category.php';
   }
if(isset($_GET['view_brand'])){
  include 'view_brand.php';
}
if(isset($_GET['edit_brand'])){
  include 'edit_brand.php';
}
if(isset($_GET['delete_brand'])){
  include 'delete_brand.php';
}
if(isset($_GET['all_order'])){
  include 'all_order.php';
}
if(isset($_GET['delete_order'])){
  include 'delete_order.php';
}
if(isset($_GET['payment'])){
  include 'all_payment.php';
}
if(isset($_GET['delete_payment'])){
  include 'delete_payment.php';
}
if(isset($_GET['user_list'])){
  include 'user_list.php';
}
if(isset($_GET['delete_user'])){
  include 'delete_user.php';
}
     ?>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>  
</body>
</html>