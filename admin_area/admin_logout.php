<?php
//
// echo "you are logout";


?>
<?php
include('catDB.php');
include('../common_function/functions.php');
// session_start();
session_start();
session_unset();
session_destroy();
echo "<script>window.open('admin_login.php')</script>";
?>