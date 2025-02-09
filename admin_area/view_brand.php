<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>view_product</title>
    <style>
    img{
        
        
        height: 100px;
            width: auto;
            max-width: 100px;
        }
    </style>

</head>
<body>
    <h4>view brand</h4>
    <table class="table table-bordered text-center">
        <thead>
            
        <?php
      
        ?>
        </thead>
        <tbody>
            <?php
    //     $username=$_SESSION['username'];
    // $select_pending="select * from `user_table` where username='$username'";
    // $result2=mysqli_query($conn,$select_pending);
    // $row_query=mysqli_fetch_assoc($result2);
    //   $userId=$row_query['userId'];
    // $SrNo=1;
    $count=1;
    $select_query="select * from `brand`";
    $result=mysqli_query($conn,$select_query);
    $count_row=mysqli_num_rows($result);
    if($count_row>0){
        echo " <tr scope='row' >
        <th scope='col'>Sr.No.</th>
        <th scope='col'>title</th>
        <th scope='col'>edit</th>
        <th scope='col'>delete</th>
    </tr> ";
        while($rows=mysqli_fetch_assoc($result)){
           
            $brandTitle=$rows['brand_title'];
            $brand_id=$rows['brand_id'];
            // $brand_id=$rows['brand_id'];
           
         
            // $select_query2="select * from "
        //    while()
            //  if($orderstatus=='pending'){
            //     $status='Incomplete';
            //  }
            //  else{
            //     $status='complete';
            //  }
            // echo  $productimage;
           echo " <tr scope='row'>
           <td> $count</td>
           <td> $brandTitle</td>
           <td> <a href='index.php?edit_brand=$brand_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
           <td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModal'><a href='index.php?delete_brand=$brand_id'> <i class='fa-solid fa-trash'></i></a> </button></td>";
        $count++;
            }
        }
           ?>
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->
            

        </tbody>
    </table>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
</body>
</html>