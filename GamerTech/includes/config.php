<?php
define('DB_SERVER','sql102.infinityfree.com');
define('DB_USER','if0_37178674');
define('DB_PASS' ,'maxraulcarrasco');
define('DB_NAME', 'if0_37178674_shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>