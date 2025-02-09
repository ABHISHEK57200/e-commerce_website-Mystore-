<?php
include('admin_area/catDB.php');
include('common_function/functions.php');
@session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styling.css">
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
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="registration.php">register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Add_To_Cart.php"><i class="fa-solid fa-cart-minus"></i></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">total price:<?php price_details();?>/-</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input class="btn btn-Outline-light" type="submit" placeholder="Search" value="search" name="search_data_product">
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
//       if(!isset($_GET['category'])){
//         if(!isset($_GET['delivery_brand'])){
//         $select_query="select * from `product` order by rand()";// showing the product randamly by using rand function
//           $result=mysqli_query($conn,$select_query);
//           // $row=mysqli_fetch_assoc($result);
//           while($row=mysqli_fetch_assoc($result)){
//             $product_id= $row['product_id'];
//             $product_title= $row['Product_Title'];
//             $product_description= $row['Product_Description'];
//             // $product_keyword= $row['product_id'];
//             $category_id= $row['category_id'];
//             $brand_id= $row['brand_id'];
//             $product_image1= $row['product_image1'];
//             // $product_image2= $row['product_image1'];
//             // $product_image3= $row['product_image1'];
//             $product_id= $row['product_id'];
//             // echo "$product_image1";
//             // $product_id= $row['product_id'];
//             // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
//             echo "  <div class='col-md-4'>
//         <div class='card' style='width: 18rem;'>
//   <img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
//   <div class='card-body'>
//     <h5 class='card-title'> $product_title</h5>
//     <p class='card-text'>$product_description</p>
//     <a href='#' class='btn btn-primary'>Go somewhere</a>
//   </div>
// </div>
//         </div>";
//           }
//         }
//       }
    // getProducts();
    get_unique_id();
    get_unique_brands();
    search_product();
          // echo $row['Product_Title'];

          // IF THE CATEGORY IS SET

    //       if(isset($_GET['category'])){
    //         // $category_id_query="select category_id from insert_product";
    //         // $category_id_result=mysqli_query($conn,$category_id_query);
    //           $category_id=$_GET['cat_id'];
    //         $select_query="select * from `product` order by rand()";// showing the product randamly by using rand function
    //           $result=mysqli_query($conn,$select_query);
    //           // $row=mysqli_fetch_assoc($result);
    //           while($row=mysqli_fetch_assoc($result)){
    //             $product_id= $row['product_id'];
    //             $product_title= $row['Product_Title'];
    //             $product_description= $row['Product_Description'];
    //             // $product_keyword= $row['product_id'];
    //             $category_id= $row['category_id'];
    //             $brand_id= $row['brand_id'];
    //             $product_image1= $row['product_image1'];
    //             // $product_image2= $row['product_image1'];
    //             // $product_image3= $row['product_image1'];
    //             $product_id= $row['product_id'];
    //             // echo "$product_image1";
    //             // $product_id= $row['product_id'];
    //             // echo $product_id, $product_title,$product_description,$category_id, $brand_id,$product_image1,$product_image2,$product_image3,$product_id;
    //             echo "  <div class='col-md-4'>
    //         <div class='card' style='width: 18rem;'>
    //   <img src='./upload_image/ $product_image1' class='card-img-top' alt='$product_title'>
    //   <div class='card-body'>
    //     <h5 class='card-title'> $product_title</h5>
    //     <p class='card-text'>$product_description</p>
    //     <a href='#' class='btn btn-primary'>Go somewhere</a>
    //   </div>
    // </div>
    //         </div>";
    //           }
    //         }
          
        ?>
        <!-- <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div> -->

        

        <!-- <div class="col-md-4">
          <div class="card" style="width: 18rem;">
  <img src="13.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div> -->



        <div class="col-md-4">
        <!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
      
        </div>
        <!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->

<!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->

<!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
<!-- <div class="card" style="width: 20rem;">
  <img src="12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
      </div>
    </div>


    <div class="col-md-2 bg-secondary p-0"> 
      <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
            <a class="nav-link active text-light" aria-current="page" href="#"><h4>delivery_brand</h4></a>
          </li>

          <!-- view the data from the databse to display on the user page -->

          <?php
          $select_brand='select * from brand';//selct all brand from the database
          $select_result=mysqli_query($conn, $select_brand);//execute the cselect brand
          // $select_rows=mysqli_fetch_assoc($select_result);// fetch the data from the rows,the select query fetch the data in array format
          // echo $select_rows['brand_title']//
          while($select_rows=mysqli_fetch_assoc($select_result)){
          $brand_title=$select_rows['brand_title'] ;
          $brand_id=$select_rows['brand_id'];
          // echo $brand_title;
          echo "<li class='nav-item'>
      <a  aria-current='page' href='iidex.php ? brand=$brand_id' value='brand'> $brand_title</a>
    </li>";
          }
          ?>




    <!-- <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">brand</a>
    </li>
    
      <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">product1</a>
    </li>
    
      <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">product2</a>
    </li>
      
      <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">product3</a>
    </li>
      
      <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">product4</a>
    </li>
    
      <li class="nav-item">
      <a href="nav-link-active text-light" aria-current="page" href="#">product5</a>
    </li>
      </ul> -->
      <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info ">
            <a class="nav-link active text-light" aria-current="page" href="#" ><h4>category</h4></a>
          </li>


          <?php
          $select_brand='select * from insert_category';//selct all brand from the database
          $select_result=mysqli_query($conn, $select_brand);//execute the cselect brand
          // $select_rows=mysqli_fetch_assoc($select_result);// fetch the data from the rows,the select query fetch the data in array format
          // echo $select_rows['brand_title']//
          while($select_rows=mysqli_fetch_assoc($select_result)){
          $brand_title=$select_rows['cat_titlle'] ;
          $category_id=$select_rows['id'];
          // echo $brand_title;
          echo "<li class='nav-item'>
      <a aria-current='page' href='iidex.php?cat_id=$category_id' value='category' > $brand_title</a>
    </li>";
          }
          ?>

    <li class="nav-item">
      <!-- <a class="nav-link-active text-light" aria-current="page" href="#">brand1</a>
    </li>
    <li class="nav-item">
  <a class="nav-link-active text-light" aria-current="page" href="#">brand2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-active text-light" aria-current="page" href="#">brand3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-active text-light" aria-current="page" href="#">brand4</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-active text-light" aria-current="page" href="#">brand5</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-active text-light" aria-current="page" href="#">brand6</a>
    </li>
</ul> -->
  </div>


    
  
    <h1>Hello, world!</h1>

  <footer >
    <p > copyright 2002</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>