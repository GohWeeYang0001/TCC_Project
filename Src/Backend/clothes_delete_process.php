<?php
session_start();
include 'dbconnect.php';

if(isset($_GET['id'])){

    $clothes_id = $_GET['id'];

    $sql1 = "DELETE FROM clothes WHERE clothes_id = '$clothes_id'";

    $admin_id = 'GohWeeYang0001';
    $admin_latest_update_time = date('Y-m-d H:i:s');

    $sql2 = "UPDATE admin SET admin_latest_update = '$admin_latest_update_time' where admin_id = '$admin_id'";

    if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE) {
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.php>';
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error;
        echo "Error: " . $sql2 . "<br>" . $con->error;
    }

} else{
  echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
}  
?>
