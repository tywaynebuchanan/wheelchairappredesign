<?php
$conn_error = "Could not connect";
$db_host = 'localhost';
$db_user ='root';
$db_password ='';
$mysql_db ='wheelchairapp';
// $config = parse_ini_file('auth\config.ini'); 
$conn = mysqli_connect($db_host,$db_user,$db_password) or die ('The username or password is incorrect');
mysqli_select_db($conn,$mysql_db) or die('Not such database present');

?>