<?php
session_start();
include 'dbconnect.php';
if(isset($_POST['submit'])){

    $clothes_id = $_POST['clothes_id'];
    $clothes_name = $_POST['clothes_name'];
    $clothes_type = $_POST['clothes_type'];
    $clothes_brand = $_POST['clothes_brand'];
    $clothes_size = $_POST['clothes_size'];
    $clothes_price = $_POST['clothes_price'];
    $clothes_stock = $_POST['clothes_stock'];

    $sql1 = "INSERT INTO clothes (clothes_name, clothes_type, clothes_brand, clothes_size, clothes_price, clothes_stock)
            values ('$clothes_name', '$clothes_type','$clothes_brand','$clothes_size','$clothes_price','$clothes_stock')";

    $admin_id = 'GohWeeYang0001';
    $admin_latest_update_time = date('Y-m-d H:i:s');

    $sql2 = "UPDATE admin SET admin_latest_update = '$admin_latest_update_time' where admin_id = '$admin_id'";

    if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE) {

          // auto-generated ID for the new Clothe (auto increment)
          $clothes_id = $con->insert_id;

          // registration table
          // $registration_date = date("Y-m-d H:i:s"); // current date time

          // $sql1 = "UPDATE admin SET last_update_time = "$registration_date";
          // $conn->query($sql1);

          mysqli_close($con);
          echo '<script>alert("Clothes Added successfully!");</script>';
          echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.php>';

    } else {
      echo "Error: " . $sql1 . "<br>" . $con->error;
      echo "Error: " . $sql2 . "<br>" . $con->error;

    }

} else{
  echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}  
?>
9','1','BD1','0','1','1'); DROP DATABASE tcc_clothes_shop; --