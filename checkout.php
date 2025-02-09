<?php
include('admin_area/catDB.php');
// include('common_function/functions.php');
@session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styling.css">
    <style>
      body{
        overflow-x: hidden;
      }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid p=0" style="background-color:blue">
      <a class="navbar-brand" href="#">
        <div >
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4GFscrh7YagjLPPWaBJCjbiQUkp9GzFFGGg&s"  class="logo" alt="">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse padding=0" id="navbarSupportedContent"  >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="iidex.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display_all.php">product</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="registration.php">register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_To_Cart.php"><i class="fa-solid fa-cart-minus"> 
            </i></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">total price:</a>
          </li> -->
        </ul>
        <form class="d-flex" role="search" action="search_product.php" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" >
          <input class="btn btn-Outline-light" type="submit" placeholder="Search" aria-label="Search" name="search_data_product" >
          <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        </form>
        
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary " >
  <ul class="navbar-nav me-auto">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">welcome guest!</a>
          </li> -->
          <?php
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
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='login.php'> Login</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='logout.php'> logout</a>
          </li>";
          }
          ?>
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"> Login</a>
          </li> -->
</ul>
  </nav>
  <div class="bg-light">
    <h1 class="text-center"> My Store</h1>
    <p class="text-center"> communication is at least heart of the e-commerce and community</p>
  </div>
  <div class="row px-4">
                <div class="col-md-10"> 
                        <div class="row">
                            <?php
                    if(!isset($_SESSION['username'])){
                        include "login.php";
                    }
                    else{
                        include "payment.php"; 
                    }
                    ?>



                        <div class="col-md-4">
                
                </div> 
  </div>


    
  
   

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>