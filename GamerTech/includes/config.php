<?php
define('DB_SERVER','finalperro.cjio0iamoi8b.us-east-1.rds.amazonaws.com:8888');
define('DB_USER','admin');
define('DB_PASS' ,'76668813');
define('DB_NAME', 'if0_37178674_shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
