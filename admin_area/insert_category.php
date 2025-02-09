<?php
    include ('catDB.php');
    if(isset($_POST['insert_cat'] ))
    {
        $cattitle=$_POST['cat_title'];//currently inserted value
    // select the data from the database
    $select_query="select *from  insert_category where  cat_titlle='$cattitle'";
    $result_select=mysqli_query($conn, $select_query);
    $numbers=mysqli_num_rows($result_select); // it gat the number of rows in particular result
    // $stmt=$conn->prepare("insert into insert_category(cat_titlle) values(?)");
    if($numbers>0){
      echo" <script>alert('data is already present')</script>";
    }
    else{
        // echo" <script>alert('data is inserted sucessfuly')</script>";
    
    $insert_query="insert into `insert_category`(cat_titlle) values( '$cattitle')";
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
<h2 class="text-center">insert category</h2>
    <form action="" method="POST" class="mt-5">
        <div class="input-group  w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1" ><i class="fa-solid fa-reciept"></i></span>
        <input type="text" class="form-control " name="cat_title" placeholder="insert category">
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" name="insert_cat" placeholder="insert" class="bg-info p-2 border-1">
        <!-- <button type="submit" class="bg-info p-2 border-1"> view category</button> -->
        </div>
        
    </form>
