<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost'); //tcc-project-db2.cb66soim6w7q.us-east-1.rds.amazonaws.com
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'admin123'); //admin123
define('DB_NAME', 'tcc_clothes_shop');

/* Attempt to connect to MySQL database */
$con= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$title = 'TCC Clothes Shop';
// $icontitle = '<link rel="icon" href="assets/img/logo.png" type="image/icon type">';
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>




